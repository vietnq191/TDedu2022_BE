<?php
namespace App\Repositories\UserProfile;

use App\Repositories\RepositoryInterface;

interface UserProfileRepositoryInterface extends RepositoryInterface
{
    public function update($id, $attributes = []);
}
