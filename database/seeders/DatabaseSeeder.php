<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(class:SuperUserSeeder::class);

        $this->call(class:RoleAndPermissionSeeder::class);

         Account::factory(5)
             ->has(Organization::factory()->count(2))
             ->has(Contact::factory()->count(200))->create();

         User::factory(5)->create();

        $this->call(class:AdminSeeder::class);
    }
}
