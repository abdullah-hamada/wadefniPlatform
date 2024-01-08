<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $job_seekerRole = Role::create(['name' => 'job_seeker']);

        // Define resources
        $resources = ['articles', 'jobs', 'users', 'applications', 'categories'];

        // Create permissions
        foreach ($resources as $resource) {
            $permissions = [
                'create '.$resource,
                'edit '.$resource,
                'view '.$resource,
                'delete '.$resource,
            ];

            foreach ($permissions as $permission) {
                Permission::create(['name' => $permission]);
                $adminRole->givePermissionTo($permission);
            }
        }
        // Assign individual permission to user role
        $createArticlePermission = Permission::where('name', '=', 'create articles')->first();
        $job_seekerRole->givePermissionTo($createArticlePermission->name);

        $editArticlePermission = Permission::where('name', '=', 'edit articles')->first();
        $job_seekerRole->givePermissionTo($editArticlePermission->name);

        $viewArticlePermission = Permission::where('name' ,'=', 'view articles')->first();
        $job_seekerRole->givePermissionTo($viewArticlePermission->name);

        $deleteArticlePermission = Permission::where('name' ,'=', 'delete articles')->first();
        $job_seekerRole->givePermissionTo($deleteArticlePermission->name);

        $viewJobPermission = Permission::where('name' ,'=', 'view jobs')->first();
        $job_seekerRole->givePermissionTo($viewJobPermission->name);

        $createApplicationsPermission = Permission::where('name' ,'=', 'create applications')->first();
        $job_seekerRole->givePermissionTo($createApplicationsPermission->name);

    }
}
