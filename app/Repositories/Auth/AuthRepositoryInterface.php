<?php

namespace App\Repositories\Auth;

use App\Repositories\RepositoryInterface;

interface AuthRepositoryInterface extends RepositoryInterface
{
    public function login($user);

    public function getUserByUsernameOrMail($request);

    public function getProfiles($user);

    public function logout($user);

    public function register($data);

    public function sendResetPassword($user);

    public function changePassword($id, $new_password);

    public function updateProfile($id, $data);
}
