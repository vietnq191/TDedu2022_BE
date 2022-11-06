<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\GetListUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface|\App\Repositories\Repository
     */
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
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

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(User $userProfile)
    {
        //
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
    public function destroy(User $userProfile)
    {
        //
    }
}
