<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\UserProfile\UserProfileRepository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as ModelsRole;

class UserRepository extends BaseRepository implements UserRepositoryInterface
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

    public function createUser($data = [])
    {
        DB::beginTransaction();
        try {
            $password = Str::random(8);

            $user = $this->getModel()::create(array_merge(
                $data,
                ['password' => bcrypt($password)]
            ));
            $this->userProfileRepo->create(array_merge(
                $data,
                ['user_id' => $user->id]
            ));
            $role = ModelsRole::where('name', $data['role'])->first();
            if ($role) {
                $user->assignRole($role->name);
            }
            DB::commit();
            return [$this->userProfileRepo->getProfiles($user), $password];
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
