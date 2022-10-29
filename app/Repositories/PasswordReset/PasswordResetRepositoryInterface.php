<?php
namespace App\Repositories\PasswordReset;

use App\Repositories\RepositoryInterface;

interface PasswordResetRepositoryInterface extends RepositoryInterface
{
    public function getPasswordResetByToken($token);
}
