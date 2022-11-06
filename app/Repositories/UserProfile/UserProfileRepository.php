<?php

namespace App\Repositories\UserProfile;

use App\Repositories\BaseRepository;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\UserProfile::class;
    }

    public function update($id, $attributes = [])
    {
        try {
            unsetDataUserProfile($attributes);

            $result = $this->getModel()::where('user_id', $id)->update($attributes);
            if ($result) {
                return $result;
            }
    
            return false;
    
        } catch (\Throwable $th) {
            dd($th);
            return null;
        }
    }

    public function getProfiles($user)
    {
        try {
            if ($user) {
                $user = array_merge(json_decode($user, true), json_decode($user->getProfiles->makeHidden(['user_id']), true));
            }

            return $user;
        } catch (\Throwable $th) {
            dd($th);
            return null;
        }
    }
}
