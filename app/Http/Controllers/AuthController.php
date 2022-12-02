<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthResetPasswordRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\SendResetPasswordRequest;
use App\Http\Requests\Auth\UpdateProfileRequest;
use App\Models\Ban;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\PasswordReset\PasswordResetRepositoryInterface;
use App\Traits\UserBanTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use UserBanTrait;
    /**
     * @var AuthRepositoryInterface|\App\Repositories\Repository
     */
    protected $authRepo;
    protected $passwordResetRepo;
    protected $authUser;

    public function __construct(AuthRepositoryInterface $authRepo, PasswordResetRepositoryInterface $passwordResetRepo)
    {
        $this->authRepo = $authRepo;
        $this->passwordResetRepo = $passwordResetRepo;
        $this->authUser = Auth::guard('api')->user();
        $this->middleware('ban')->only('updateProfile', 'changePassword', 'userProfile');
    }

    public function login(LoginRequest $request)
    {
        //To do: Error message
        $messages = [
            'user_notfound' => 'Your authentication information is incorrect. Please try again',
            'user_inactive' => 'Your account is inactive',
            'user_ban_until_updated' => 'You have banned. Please contact to admin for the reason',
            'too_many_login_attempts' => 'You have banned. Too many login attempts'
        ];

        $data = $request->getParam();

        //To do: Get user by username or mail
        $user = $this->authRepo->getUserByUsernameOrMail($data['username']);

        //To do: Check account is exist and match password
        if (!$user) {
            return response()->json(array(
                'username' => array($messages['user_notfound'])
            ), 400);
        }
        if($user->status == 'Inactive')
        {
            return response()->json(array(
                'username' => array($messages['user_inactive'])
            ), 400);
        }
        if($user->status == 'Banned')
        {
            $userBanned = Ban::where('bannable_id', $user->id)
            ->where('bannable_type', $user->getMorphClass())->latest('updated_at')->whereNull('deleted_at')->first();
            if($userBanned && $userBanned->duration == "Until updated")
            {
                return response()->json(array(
                    'username' => array($messages['user_ban_until_updated'])
                ), 400);
            }
            if($userBanned)
            {
                $time_remaining = $this->getTimeRemaining($userBanned->expired_at);
                return response()->json(['email' => [textDisplayTimeBan($userBanned->duration, $time_remaining)]], 400);
            }
        }

        if (RateLimiter::tooManyAttempts($this->throttleKey(), config('apiconst.time_login_fail'))) {
            $user->status = 'Banned';
            $user->save();
            $userBan = $user->ban([
                'comment' => 'Too many login attempts',
                'expired_at' => '+5 minute'
            ]);
            $userBan->duration = '5 minutes';
            $userBan->save();

            RateLimiter::clear($this->throttleKey());
            return response()->json(['email' => array($messages['too_many_login_attempts'])], 400);
        }

        if (!Hash::check($request['password'], $user->password)) {
            RateLimiter::hit($this->throttleKey(), 900);
            return response()->json(array(
                'password' => array($messages['user_notfound'])
            ), 400);
        }

        RateLimiter::clear($this->throttleKey());
        return response()->json($this->authRepo->login($user));
    }

    private function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function logout()
    {
        //To do: Check user has logged
        if ($this->authUser) {
            $user = $this->authRepo->logout($this->authUser);
            return response()->json(['message' => array("Logout success"), 'revoke' => $user->token()->revoke()]);
        }

        return response()->json(['message' => array("Not found authentication")], 400);
    }

    public function userProfile()
    {
        return response()->json($this->authRepo->getProfiles($this->authUser));
    }

    public function register(RegisterRequest $request) {
        $data = $request->getParam();
        return response()->json($this->authRepo->register($data));
    }

    public function changePassword(ChangePasswordRequest $request) {
        $messages = ['incorrect_password' => 'Old password is incorect.'];
        $data = $request->getParam();

        //To do: Check auth is valid
        if($this->authUser) {
            //To do: Check old password is correct
            if (Hash::check($data['old_password'], $this->authUser->password)) {

                //To do: Find user and update password
                $user = $this->authRepo->getUserByUsernameOrMail($this->authUser->email);
                $result = $this->authRepo->changePassword($user->id, $data['new_password']);
    
                if(!$result){
                    return response()->json(['message' => ['Password change failed']]);
                }
    
                return response()->json(['message' => ['Password changed successfully.']]);
            } else {
                return response()->json(['old_password' => [$messages['incorrect_password']]], 400);
            }    
        }

        return response()->json(['message' => ['Not found authentication']]);
    }

    public function sendResetPassword(SendResetPasswordRequest $request) {
        $data = $request->getParam();

        //To do: Get user by username or mail
        $user = $this->authRepo->getUserByUsernameOrMail($data['username']);

        if (!$user) {
            return response()->json([
                'email' => ["Your authentication information is incorrect. Please try again"],
            ], 400);
        }

        //To do: Send mail queue
        $this->authRepo->sendResetPassword($user);

        return response()->json([
            'message' => ["We have emailed your password reset link!"]
        ]);
    }

    public function resetPassword(AuthResetPasswordRequest $request) {
        $data = $request->getParam();
        
        //To do: Get account by token
        $passwordReset = $this->passwordResetRepo->getPasswordResetByToken($data['token']);
        if (!$passwordReset) {
            return response()->json([
                'token' => ['This password reset token is invalid.'],
            ], 400);
        }

        //To do: check token is valid
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $this->passwordResetRepo->delete($passwordReset->id);

            return response()->json([
                'token' => ['This password reset token is invalid.'],
            ], 400);
        }

        //To do: check user is exist
        $user = $this->authRepo->getUserByUsernameOrMail($passwordReset->email);
        if (!$user) {
            return response()->json([
                'token' => ['User not found.'],
            ], 400);
        }
        
        //To do: Update password
        $result = $this->authRepo->changePassword($user->id, $data['password']);
        if(!$result) {
            return response()->json(['message' => ['Password change failed']]);
        }
        //To do: Delete token
        $this->passwordResetRepo->delete($passwordReset->id);

        return response()->json([
            'message' => ['Password changed successfully.'],
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request) {
       $data = $request->getParam();
       return response()->json($this->authRepo->updateProfile($request['id'], $data));
    }
}
