<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * @var AuthRepositoryInterface|\App\Repositories\Repository
     */
    protected $authRepo;
    protected $authUser;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
        $this->authUser = Auth::guard('api')->user();
    }

    public function login(LoginRequest $request)
    {
        $messages = ['user_notfound' => 'Your authentication information is incorrect. Please try again'];
        $data = $request->getParam();
        $user = $this->authRepo->getUserByUsernameOrMail($data);
        if (!$user) {
            return response()->json(array(
                'username' => array($messages['user_notfound'])
            ), 400);
        } else if (!Hash::check($request['password'], $user->password)) {
            return response()->json(array(
                'password' => array($messages['user_notfound'])
            ), 400);
        }

        return response()->json($this->authRepo->login($user));
    }

    public function logout()
    {
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
}
