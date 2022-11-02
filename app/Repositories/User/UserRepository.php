<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getListUsers($request)
    {
        if (isSuperAdmin()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Lecturer", "Student"]);
            })->filter($request)->paginate();
        }

        if (isLecturer()) {
            $users = $this->getModel()::whereHas("roles", function ($query) {
                $query->whereIn("name", ["Student"]);
            })->filter($request)->paginate();
        }

        $users->map(function ($item) {
            $item->full_name = $item->getProfiles->full_name;
            $item->mobile_phone = $item->getProfiles->mobile_phone;
            $item->date_of_birth = $item->getProfiles->date_of_birth;
            $item->address = $item->getProfiles->address;
            $item->gender = $item->getProfiles->gender;
            $item->makeHidden(['getProfiles']);
        });
        
        return $users;
    }
}
