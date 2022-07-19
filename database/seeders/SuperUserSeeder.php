<?php

namespace Database\Seeders;
use App\Models\Accounts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Accounts::create([
        'id'=>'1',
        'name'=>'super_account',
       

        ]);
    }
}
