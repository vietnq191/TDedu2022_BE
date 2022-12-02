<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\BulkUserRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\GetListUserRequest;
use App\Http\Requests\User\GetUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Traits\SendMailTrait;

class UserController extends Controller
{
    use SendMailTrait;
    /**
     * @var UserRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('ban');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetListUserRequest $request)
    {
        $data = $request->getParam();
        return response()->json($this->userRepo->getListUsers($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $create_user = $this->userRepo->createUser($request->getParam());
        if (!$create_user) {
            return response()->json(['error' => 'Create user failed'], 400);
        }
        $user = $create_user[0];
        $password = $create_user[1];
        $this->sendPassword($user['full_name'], $user['email'], $password);

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(GetUserRequest $request)
    {
        return response()->json($this->userRepo->getUser($request->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        return response()->json($this->userRepo->updateUser($request->id, $request->getParam()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(GetUserRequest $request)
    {
        $delete = $this->userRepo->delete($request->id);
        if (!$delete) {
            return response()->json(['error' => 'Delete user failed'], 400);
        }

        return response()->json(['message' => 'Deleted user']);
    }

    public function bulkDeleteUser(BulkUserRequest $request)
    {
        $user_ids = $request->getParam()['user_ids'] ?? [];
        $delete = $this->userRepo->bulkDelete($user_ids);
        if (!$delete) {
            return response()->json(['error' => 'Bulk delete user failed'], 400);
        }

        return response()->json(['message' => 'Bulk delete user successfully']);
    }

    public function exportAllUser()
    {
        return response($this->userRepo->exportAllUser());
    }

    public function exportUser(BulkUserRequest $request)
    {
        $user_ids = $request->getParam()['user_ids'] ?? [];
        return response($this->userRepo->exportUser($user_ids));
    }

    public function banHistory(GetUserRequest $request) 
    {
        return response($this->userRepo->getBanHistory($request['id']));
    }
}
