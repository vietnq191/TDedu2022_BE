<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $messages = [
            'user_notfound' => 'Your authentication information is incorrect. Please try again',
        ];

        $user = User::where(function ($query) use ($request) {
            return $query->where('email', $request->username)->orWhere('username', $request->username);
        })->first();

        if (!$user) {
            return response()->json([
                'username' => [$messages['user_notfound']],
            ], 400);
        }
        else if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'password' => [$messages['user_notfound']],
            ], 400);
        }

        $token = $user->createToken('api', ['api'])->accessToken;
        return $this->createPassportToken($user, $token);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        $user->bearer_token = '';
        $user->save();
        return response()->json(['message' => "Logout success", 'revoke' => $user->token()->revoke()]);
    }

    public function userProfile(Request $request)
    {
        return response()->json(Auth::guard('api')->user());
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
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 0,
            'user' => $user,
        ]);
    }
}
