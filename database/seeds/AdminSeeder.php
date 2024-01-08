<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin role if it doesn't exist
        $adminRole = Role::where('name','=', 'admin')->first(); // Assuming you have a role with an ID of 1
        // Create admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@wadhefni.com',
            'password' => bcrypt('123456789'), // Replace 'password' with the desired admin password
        ]);

        // Assign admin role to the admin user
        $admin->assignRole($adminRole);
    }
}
