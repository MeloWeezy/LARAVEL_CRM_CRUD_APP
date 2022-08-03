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
         // Reset cached roles and permissions

         // create permissions
         $permissions = [
             'create-account',
             'read-account',
             'update-account',
             'delete-account',
             'create-contact',
             'read-contact',
             'update-contact',
             'delete-contact',
             'create-organization',
             'read-organization',
             'update-organization',
             'delete-organization',
             'create-user',
             'update-user',
             'delete-user',
             'read-user',
          ];

          foreach ($permissions as $permission)
          {
            Permission::create(['name' => $permission,'guard_name'=>'web']);
          };
        foreach ($permissions as $permission)
        {
            Permission::create(['name' => $permission,'guard_name'=>'api']);
        };

        $role1 = Role::create(['name'=>'admin','guard_name'=>'api']);
        foreach ($permissions as $permission) {
            if(($permission !=='create-accoount')&& ($permission !=='update-account')&&($permission !=='delete-account'))
            {
                $role1->givePermissionTo($permission);
            };

        };


        $role3 = Role::create(['name' => 'user','guard_name'=>'api']);

        $role3->givePermissionTo('read-contact');
        $role3->givePermissionTo('read-organization');
        $role3->givePermissionTo('read-user');
        $role3->givePermissionTo('delete-user');
        $role3->givePermissionTo('read-user');
        $role3->givePermissionTo('create-contact');

        $role2 = Role::create(['name' => 'user','guard_name'=>'web']);

        $role2->givePermissionTo('read-contact');
        $role2->givePermissionTo('read-organization');
        $role2->givePermissionTo('read-user');
        $role2->givePermissionTo('delete-user');
        $role2->givePermissionTo('read-user');
        $role2->givePermissionTo('create-contact');

        $super_role = Role::create(['name'=>'super_admin','guard_name'=>'web']);
        $super_role = Role::create(['name'=>'super_admin','guard_name'=>'api']);

        
}
}