<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the datab
     * ase seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'=>'Super',
            'last_name'=>'Admin',
            'email'=> 'super@gmail.com',
            'remember_token'=>'12345566oo',
            'phone'=> '084567890',
            'role'=>'admin',
            'verified_at'=> now(),
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo_path' => '1',
            'accounts_id'=>'1',
            'organizations_id' => '1'


        ]);

        $user->assignRole('super_admin');

        $user = User::create([
            'first_name'=>'Admin',
            'last_name'=>'Admin',
            'email'=> 'melusi@gmail.com',
            'remember_token'=>'12345566oo',
            'phone'=> '084567890',
            'role'=>'admin',
            'verified_at'=> now(),
            'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'photo_path' => '1',
            'accounts_id'=>'1',
            'organizations_id'=>'1',


        ]);

        $user->assignRole('admin');

    }
}
