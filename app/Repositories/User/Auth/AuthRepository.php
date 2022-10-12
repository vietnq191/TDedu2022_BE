<?php

namespace App\Repositories\User\Auth;

use App\Repositories\BaseRepository;

class AuthRepository extends BaseRepository implements AuthRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }
}
