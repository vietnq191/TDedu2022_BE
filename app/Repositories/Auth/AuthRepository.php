<?php

namespace App\Repositories\Auth;

use Illuminate\Support\Facades\DB;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordRequest;
use App\Repositories\BaseRepository;
use App\Repositories\UserProfile\UserProfileRepository;
use Spatie\Permission\Models\Role as ModelsRole;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    public $userProfileRepo;

    function __construct(UserProfileRepository $userProfileRepo)
    {
        $this->userProfileRepo = $userProfileRepo;
    }

    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function login($user)
    {
        $token = $user->createToken('api', ['api'])->accessToken;
        return $this->createPassportToken($user, $token);
    }

    public function getUserByUsernameOrMail($request)
    {
        return $this->getModel()::where(function ($query) use ($request) {
            return $query->where('email', $request)->orWhere('username', $request);
        })->where('status', 'ACTIVE')->first();
    }

    private function createPassportToken($user, $token)
    {
        $user->bearer_token = $token;
        $firsttime_login = false;
        if ($user->last_login == null) {
            $firsttime_login = true;
        }
        $user->last_login = now();
        $user->save();
        $user->first_time_login = $firsttime_login;
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 0,
            'user' => $user->makeHidden('roles'),
            'role' => $user->getRoleNames(),
            'permissions' => $user->getPermissionsViaRoles()->pluck('name'),
        ];
    }

    public function getProfiles($user)
    {
        try {
            $user = $this->getModel()::find($user ? $user->id : null);
            if ($user) {
                $user = array_merge(json_decode($user, true), json_decode($user->getProfiles->makeHidden(['user_id']), true));
            }

            return $user;
        } catch (\Throwable $th) {
            dd($th);
            return null;
        }
    }

    public function logout($user)
    {
        $user->bearer_token = '';
        $user->save();
        return $user;
    }

    public function register($data)
    {
        DB::beginTransaction();
        try {
            $user = $this->getModel()::create(array_merge(
                $data,
                ['password' => bcrypt($data['password'])]
            ));
            $this->userProfileRepo->create(array_merge(
                $data,
                ['user_id' => $user->id]
            ));
            $role = ModelsRole::where('name', 'Student')->first();
            if ($role) {
                $user->assignRole($role->name);
            }
            DB::commit();
            return $this->getProfiles($user);
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function sendResetPassword($user)
    {
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token, env('CUSTOM_DOMAIN', 'http://103.90.226.188/')));
        }
    }

    public function changePassword($id, $new_password)
    {
        $user = $this->getModel()::find($id);
        if($user)
        {
            return $user->update(['password' => bcrypt($new_password)]);
        }

        return null;
    }

    public function updateProfile($id, $data)
    {
        $user = $this->getModel()::find($id);
        if($user)
        {
            $user->update($data);
            $this->userProfileRepo->update($user->id, $data);
        }

        return $this->getProfiles($user);
    }
}
