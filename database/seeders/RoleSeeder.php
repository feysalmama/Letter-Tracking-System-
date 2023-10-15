<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'writer']);
        

        // Create the 'user' role for regular users who use your application.
        Role::create(['name' => 'user']);

        // Create the 'office' role for registered offices and organizational entities.
        Role::create(['name' => 'office']);
        

        // $permission = Permission::create(['name' => 'edit articles']);
    }
}
