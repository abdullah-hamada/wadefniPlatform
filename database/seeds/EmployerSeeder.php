<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $employerRole = Role::create(['name' => 'employer']);

        // Assign individual permission to employer role
        $createArticlePermission = Permission::where('name', '=', 'create articles')->first();
        $employerRole->givePermissionTo($createArticlePermission->name);

        $editArticlePermission = Permission::where('name', '=', 'edit articles')->first();
        $employerRole->givePermissionTo($editArticlePermission->name);

        $viewArticlePermission = Permission::where('name' ,'=', 'view articles')->first();
        $employerRole->givePermissionTo($viewArticlePermission->name);

        $deleteArticlePermission = Permission::where('name' ,'=', 'delete articles')->first();
        $employerRole->givePermissionTo($deleteArticlePermission->name);

        $viewJobPermission = Permission::where('name' ,'=', 'view jobs')->first();
        $employerRole->givePermissionTo($viewJobPermission->name);

        $createJobPermission = Permission::where('name' ,'=', 'create jobs')->first();
        $employerRole->givePermissionTo($createJobPermission->name);

        $editJobPermission = Permission::where('name' ,'=', 'edit jobs')->first();
        $employerRole->givePermissionTo($editJobPermission->name);

        $deleteJobPermission = Permission::where('name' ,'=', 'delete jobs')->first();
        $employerRole->givePermissionTo($deleteJobPermission->name);

        $viewApplicationsPermission = Permission::where('name' ,'=', 'view applications')->first();
        $employerRole->givePermissionTo($viewApplicationsPermission->name);

    }
}
