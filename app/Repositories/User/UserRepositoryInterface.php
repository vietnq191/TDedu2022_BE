<?php
namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getListUsers($request);

    public function createUser($data = []);

    public function updateUser($id, $data = []);

    public function getUser($id);

    public function delete($id);

    public function bulkDelete($ids = []);

    public function exportAllUser();

    public function exportUser($ids = []);

    public function getBanHistory($id);
}