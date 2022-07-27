<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name'=>'super_admin','guard_name'=>'api']);
        Role::create(['name' => 'admin','guard_name'=>'api']);
        Role::create(['name' => 'user','guard_name'=>'api']);
    }
}
