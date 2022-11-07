<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Language', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Languages', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Language', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Language', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Country', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Countries', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Country', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Country', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Cities', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-City', 'guard_name' => 'admin']);



        // Permission::create(['name' => 'Create-Sport', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Sports', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Sport', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Sport', 'guard_name' => 'admin']);



        // Permission::create(['name' => 'Create-Ad', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Ads', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Ad', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Ad', 'guard_name' => 'admin']);




        // Permission::create(['name' => 'Create-On-Boarding', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-On-Boardings', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-On-Boarding', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-On-Boarding', 'guard_name' => 'admin']);



        Permission::create(['name' => 'Create-Nationality', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Nationalities', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Nationality', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Nationality', 'guard_name' => 'admin']);
    }
}
