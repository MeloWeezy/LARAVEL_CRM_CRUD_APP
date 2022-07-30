<?php

namespace Database\Seeders;
use App\Models\Account;
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
        Account::create([
        'id'=>'1',
        'name'=>'Super Account',
        ]);

        Organization::create([
           'id'=>'1',
           'name'=>'Super Organization',
           'email'=>'org@email.com',
           'city'=>'jhb',
           'phone'=>'0987654321',
           'country'=>'rsa',
           'region'=>'thsss',
           'address'=>'5206 osizweni',
           'postal_code'=>'2952',
           'account_id'=>'1',
        ]);
    }
}
