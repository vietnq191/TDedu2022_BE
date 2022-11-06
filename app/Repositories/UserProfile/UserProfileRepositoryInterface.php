<?php
namespace App\Repositories\UserProfile;

use App\Repositories\RepositoryInterface;

interface UserProfileRepositoryInterface extends RepositoryInterface
{
    public function find($id);

    public function update($id, $attributes = []);

    public function getProfiles($user);

    public function delete($id);
}
