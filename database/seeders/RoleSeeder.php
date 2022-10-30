<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'list user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);

        // Create roles and assign existing permissions
        $roleLecturer = Role::create(['name' => 'Lecturer']);
        $roleLecturer->givePermissionTo('list user');
        $roleLecturer->givePermissionTo('create user');
        $roleLecturer->givePermissionTo('edit user');
        $lecturer = User::where('username', 'lecturer')->first();
        if ($lecturer) {
            $lecturer->assignRole($roleLecturer);
        }

        $roleStudent = Role::create(['name' => 'Student']);
        $student = User::where('username', 'student')->first();
        if ($student) {
            $student->assignRole($roleStudent);
        }

        $roleAdmin = Role::create(['name' => 'Super Admin']);
        $roleAdmin->givePermissionTo('list user');
        $roleAdmin->givePermissionTo('create user');
        $roleAdmin->givePermissionTo('edit user');
        $roleAdmin->givePermissionTo('delete user');
        $admin = User::where('username', 'admin')->first();
        if ($admin) {
            $admin->assignRole($roleAdmin);
        }

        //Assign role for user
        //Just allow 30 lecturer
        $countLecturer = 0;
        $allowLecturer = 30;
        for ($number = 4; $number <= 120; $number++) {
            $randomRole = rand(0, 1);
            $user = User::find($number);
            if ($user) {
                if ($randomRole == 1 && $countLecturer < $allowLecturer) {
                    $user->assignRole($roleLecturer);
                    $countLecturer++;
                } else {
                    $user->assignRole($roleStudent);
                }
            }
        }
    }
}
