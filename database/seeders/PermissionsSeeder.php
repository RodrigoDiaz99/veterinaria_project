<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //<!-- Permission list
            //Admin Permissions
            Permission::create(['name' => 'admin index']);
            Permission::create(['name' => 'admin create']);
            Permission::create(['name' => 'admin store']);
            Permission::create(['name' => 'admin show']);
            Permission::create(['name' => 'admin attend']);
            Permission::create(['name' => 'admin edit']);
            Permission::create(['name' => 'admin update']);
            Permission::create(['name' => 'admin destroy']);

            //Cli Permissions
            Permission::create(['name' => 'index']);
            Permission::create(['name' => 'create']);
            Permission::create(['name' => 'store']);
            Permission::create(['name' => 'show']);
        //  Permission::create(['name' => 'attend']);
            Permission::create(['name' => 'edit']);
            Permission::create(['name' => 'update']);
            Permission::create(['name' => 'destroy']);
        // --> Permissions list

        //Super-Admin
        $owner = Role::create(['name' => 'Super-Admin']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'admin index',
            'admin create',
            'admin store',
            'admin show',
            'admin attend',
            'admin edit',
            'admin update',
            'admin destroy',
        ]);
        
        //Client
        $client = Role::create(['name' => 'Client']);

        $client->givePermissionTo([
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ]);

        //Super Admin
        $user = User::find(1); // PEDRO SANCHEZ
        $user->assignRole('Super-Admin');

        //Admin
        $user = User::find(2); // MARIA FERNANDA
        $user->assignRole('Admin');

        //Client
        $user = User::find(3); // EVELYN GUADALUPE
        $user->assignRole('Client');
    }
}
