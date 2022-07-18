<?php

namespace Database\Seeders;
use App\Models\User;
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
        User::create([
        'first_name'=>'admin',
        'last_name'=>'admin',
        'email'=>'admin@gmail.com',
        'photo_path'=>'1',
        'owner'=>'2020',
        'password'=> bcrypt('1234567890'),
        'accounts_id'=>'0',

        ]);
    }
}
