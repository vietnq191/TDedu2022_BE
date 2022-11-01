<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getListUsers($user_type, $request)
    {
        if (isSuperAdmin()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Lecturer", "Student"]);
            })->paginate();
        }

        if (isLecturer()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Student"]);
            })->paginate();
        }

        $users->map(function ($item) {
            $item->full_name = $item->getProfiles->full_name;
            $item->mobile_phone = $item->getProfiles->mobile_phone;
            $item->date_of_birth = $item->getProfiles->date_of_birth;
            $item->address = $item->getProfiles->address;
            $item->gender = $item->getProfiles->gender;
        });
        
        return $users->makeHidden(['getProfiles']);
    }
}
