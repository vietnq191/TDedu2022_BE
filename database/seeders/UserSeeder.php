<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'admin', 'email' => 'admin@yopmail.com', 'password' => '$2y$10$uW5y7a95MplTF9kPO5gGrekGwZ39ROM0vxniSgiIfVxs2sIHPVwBa', 'status' => 'Active', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['username' => 'lecturer', 'email' => 'lecturer@yopmail.com', 'password' => '$2y$10$uW5y7a95MplTF9kPO5gGrekGwZ39ROM0vxniSgiIfVxs2sIHPVwBa', 'status' => 'Active', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
            ['username' => 'student', 'email' => 'student@yopmail.com', 'password' => '$2y$10$uW5y7a95MplTF9kPO5gGrekGwZ39ROM0vxniSgiIfVxs2sIHPVwBa', 'status' => 'Active', 'deleted_at' => NULL, 'created_at' => '2022-08-18 19:33:47', 'updated_at' => '2022-08-18 19:33:47'],
        ]);
    }
}
