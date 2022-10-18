<?php

namespace App\Repositories\User\Auth;

use App\Models\UserProfile;
use Illuminate\Support\Facades\DB;

use App\Repositories\BaseRepository;
use Spatie\Permission\Models\Role as ModelsRole;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
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
            return $query->where('email', $request['username'])->orWhere('username', $request['username']);
        })->whereNull('deleted_at')->first();
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
            'user' => $user,
            'permission' => $user->getPermissionsViaRoles(),
            'role' => $user->getRoleNames(),
        ];
    }

    public function getProfiles($user)
    {
        $user = $this->find($user ? $user->id : null);
        if ($user) {
            $user->getProfiles;
        }

        return $user;
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
            $user = $this->model::create(array_merge(
                $data,
                ['password' => bcrypt($data['password'])]
            ));
            UserProfile::create(array_merge(
                $data,
                ['user_id' => $user->id]
            ));
            $role = ModelsRole::where('name', 'Student')->first();
            if ($role) {
                $user->assignRole($role->name);
            }
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return false;
        }
    }
}
