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
        unset($attributes['username']);
        $result = $this->getModel()::where('user_id', $id)->update($attributes);
        if ($result) {
            return $result;
        }

        return false;
    }
}
