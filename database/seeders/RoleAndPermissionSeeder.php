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
        //

         // Reset cached roles and permissions
         
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
             
          ];

          foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'web']);
        }
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'guard_name'=>'api']);
        }

        $role1 = Role::create(['name'=>'admin','guard_name'=>'api']);
        foreach ($permissions as $permission) {
            $role1->givePermissionTo($permission);
        }
        
        
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
      
       
    }
}
