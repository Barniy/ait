<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-update',
            'role-delete',
            'user-list',
            'user-create',
            'user-update',
            'user-delete',
            'user-profile-list',
            'user-profile-create',
            'user-profile-update',
            'user-profile-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
