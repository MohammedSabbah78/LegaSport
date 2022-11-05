<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Admin::create([
            'name' => 'Super Admin',
            'user_name' => 'admin',
            'email' => 'email@app.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);


        $allAdminPer = Permission::where('guard_name', 'admin')->get();
        Role::create(['name' => 'Super-Admin', 'guard_name' => 'admin'])->givePermissionTo($allAdminPer);
        Role::create(['name' => 'Human Resources Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'Client Services Admin', 'guard_name' => 'admin']);
        Role::create(['name' => 'Content Management Admin', 'guard_name' => 'admin']);
        
        //     Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        //     Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Update-Permission', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin']);

        //     Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        //     Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);


        //      Permission::create(['name' => 'Create-Language', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Read-Languages', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Update-Language', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Delete-Language', 'guard_name' => 'admin']);

        //      Permission::create(['name' => 'Create-Country', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Read-Countries', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Update-Country', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Delete-Country', 'guard_name' => 'admin']);

        //      Permission::create(['name' => 'Create-City', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Read-Cities', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Update-City', 'guard_name' => 'admin']);
        //      Permission::create(['name' => 'Delete-City', 'guard_name' => 'admin']);
    }
}
