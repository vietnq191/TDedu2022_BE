<?php

namespace App\Repositories\User\Auth;

use App\Repositories\RepositoryInterface;

interface AuthRepositoryInterface extends RepositoryInterface
{
    public function login($user);

    public function getUserByUsernameOrMail($request);

    public function getProfiles($user);

    public function logout($user);

    public function register($data);
}
