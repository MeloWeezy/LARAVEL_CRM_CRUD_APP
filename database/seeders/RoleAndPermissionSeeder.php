<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //

         // Reset cached roles and permissions
         
=======
         // Reset cached roles and permissions

>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
         // create permissions
         $permissions = [
             'create-accounts',
             'read-accounts',
             'update-accounts',
             'delete-accounts',
             'create-contacts',
             'read-contacts',
             'update-contacts',
             'delete-contacts',
             'create-organizations',
             'read-organizations',
             'update-organizations',
             'delete-organizations',
             'create-users',
             'update-users',
             'delete-users',
             'read-users',
<<<<<<< HEAD
             
          ];

          foreach ($permissions as $permission) 
          {
            Permission::create(['name' => $permission,'guard_name'=>'web']);
          };
        foreach ($permissions as $permission) 
=======
          ];

          foreach ($permissions as $permission)
          {
            Permission::create(['name' => $permission,'guard_name'=>'web']);
          };
        foreach ($permissions as $permission)
>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
        {
            Permission::create(['name' => $permission,'guard_name'=>'api']);
        };

        $role1 = Role::create(['name'=>'admin','guard_name'=>'api']);
        foreach ($permissions as $permission) {
            if(($permission !=='create-accoounts')&& ($permission !=='update-accounts')&&($permission !=='delete-accounts'))
            {
                $role1->givePermissionTo($permission);
            };
<<<<<<< HEAD
   
        };
        
        
=======

        };


>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
        $role3 = Role::create(['name' => 'user','guard_name'=>'api']);

        $role3->givePermissionTo('read-contacts');
        $role3->givePermissionTo('read-organizations');
        $role3->givePermissionTo('read-users');
        $role3->givePermissionTo('delete-users');
        $role3->givePermissionTo('read-users');
        $role3->givePermissionTo('create-contacts');

        $role2 = Role::create(['name' => 'user','guard_name'=>'web']);

        $role2->givePermissionTo('read-contacts');
        $role2->givePermissionTo('read-organizations');
        $role2->givePermissionTo('read-users');
        $role2->givePermissionTo('delete-users');
        $role2->givePermissionTo('read-users');
        $role2->givePermissionTo('create-contacts');

        Role::create(['name'=>'super_admin','guard_name'=>'api']);
<<<<<<< HEAD
      
       
=======


>>>>>>> 6d45a6c25991246249f6be2a9ee258441cefbee1
    }
}
