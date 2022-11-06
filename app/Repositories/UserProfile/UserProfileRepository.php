<?php

namespace App\Repositories\UserProfile;

use App\Repositories\BaseRepository;

class UserProfileRepository extends BaseRepository implements UserProfileRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\UserProfile::class;
    }

    private function getModelByUserID($id)
    {
        try {
            return $this->getModel()::where('user_id', $id);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function find($id)
    {
        try {
            return $this->getModel()::where('user_id', $id)->first();
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($id, $attributes = [])
    {
        try {
            unsetDataUserProfile($attributes);

            $result = $this->getModelByUserID($id)->update($attributes);
            if ($result) {
                return $result;
            }

            return false;
        } catch (\Throwable $th) {
            return false;
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
            return null;
        }
    }

    public function delete($id)
    {
        $delete = $this->getModelByUserID($id)->delete();
        if ($delete) {
            return true;
        }

        return false;
    }
}
