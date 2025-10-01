<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Setting;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Setting::firstOrCreate([

            'company_name' =>'',
        ]);


        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Create Super Admin
        $admin = Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Change it in production
            ]
        );

        // Create super-admin role
        $role = Role::firstOrCreate(
            ['name' => 'super-admin', 'guard_name' => 'admin']
        );

        // Define all permissions
        $permissions = [

            'create dashboard',
            'edit dashboard',
            'view dashboard',
            'delete dashboard',

            // role permissions
            'create role',
            'edit role',
            'view role',
            'delete role',

            // permission permissions
            'create permission',
            'edit permission',
            'view permission',
            'delete permission',


            // user permissions
            'create user',
            'edit user',
            'view user',
            'delete user',


            // setting permissions
            'create setting',
            'edit setting',
            'view setting',
            'delete setting',


            // group permissions
            'create group',
            'edit group',
            'view group',
            'delete group',


            // package permissions
            'create package',
            'edit package',
            'view package',
            'delete package',


            // plan permissions
            'create plan',
            'edit plan',
            'view plan',
            'delete plan',
            
            // languages permissions
            'create languages',
            'edit languages',
            'view languages',
            'delete languages',

            // subjects permissions
            'create subjects',
            'edit subjects',
            'view subjects',
            'delete subjects',

             // group-years permissions
            'create group-years',
            'edit group-years',
            'view group-years',
            'delete group-years',


            // qualifications permissions
            'create qualifications',
            'edit qualifications',
            'view qualifications',
            'delete qualifications',


            // coursefee permissions
            'create coursefee',
            'edit coursefee',
            'view coursefee',
            'delete coursefee',


            // coursefee permissions
            'view job',
            'view staff',
            'view apply',
            'view enquire',
            'view referral',
            'view subscribe',
            'view student',
           
            
            


        ];

        // Create and assign permissions to role
        foreach ($permissions as $perm) {
            $permission = Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'admin'
            ]);

            // Assign permission to role if not already assigned
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        }

        // Assign role to admin
        if (!$admin->hasRole($role)) {
            $admin->assignRole($role);
        }
    }
}
