<?php

namespace App\Repositories\PasswordReset;

use App\Repositories\BaseRepository;

class PasswordResetRepository extends BaseRepository implements PasswordResetRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\PasswordReset::class;
    }

    public function getPasswordResetByToken($token)
    {
        return $this->getModel()::where('token', $token)->first();
    }
}
