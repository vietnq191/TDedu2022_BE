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
        $role1 = Role::create(['name' => 'Lecturer']);
        $role1->givePermissionTo('list user');
        $role1->givePermissionTo('create user');
        $role1->givePermissionTo('edit user');
        $lecturer = User::where('username', 'lecturer')->first();
        if ($lecturer) {
            $lecturer->assignRole($role1);
        }

        $role2 = Role::create(['name' => 'Student']);
        $role2->givePermissionTo('list user');
        $student = User::where('username', 'student')->first();
        if ($student) {
            $student->assignRole($role2);
        }

        $role3 = Role::create(['name' => 'Super Admin']);
        $admin = User::where('username', 'admin')->first();
        if ($admin) {
            $admin->assignRole($role3);
        }
    }
}
