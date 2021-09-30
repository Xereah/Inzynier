<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Administrator']);
        $role1->givePermissionTo('create');
        $role1->givePermissionTo('read');
        $role1->givePermissionTo('update');
        $role1->givePermissionTo('delete');

        $role2 = Role::create(['name' => 'Uzytkownik']);
        $role2->givePermissionTo('read');
        $role2->givePermissionTo('create');


        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@wp.com',
            'adress' => 'Sieradz',
            'phone' => '513623174',
            'level' => '1',
            'password' => bcrypt('Admin@1234')
            
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Uzytkownik',
            'surname' => 'Uzytkownik',
            'email' => 'uzytkownik@wp.com',
            'adress' => 'Sieradz',
            'phone' => '513623174',
            'level' => '2',
            'password' => bcrypt('Uzytkownik@1234')
           
        ]);

        
        $user->assignRole($role2);
    }
}
