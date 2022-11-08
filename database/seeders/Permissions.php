<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'Create-Achievement_Language', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Achievements', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Achievement', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Achievement_Language', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Achievement', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Achievement_Language', 'guard_name' => 'admin']);
    }
}
