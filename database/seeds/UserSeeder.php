<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        User::create([
            'username' => 'MariaThomas',
            'email' => 'admin4@mail.com',
            'awaiting_approval' => 'verified',
            'name' => 'Maria Thomas',
            'account_name' => 'Mariam Thomas',
            'account_number' => '2104043970',
            'bank_name' => 'UBA',
            'phone' => '09060031829',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);
        User::create([
            'username' => 'DaraAmasco',
            'email' => 'admin3@mail.com',
            'awaiting_approval' => 'verified',
            'name' => 'Dara Amasco',
            'account_name' => 'Dara Amasco',
            'account_number' => '3107285938',
            'bank_name' => 'First Bank',
            'phone' => '08038085117',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);
        User::create([
            'username' => 'OkekweRita',
            'email' => 'admin2@mail.com',
            'awaiting_approval' => 'verified',
            'name' => 'Okekwe Rita',
            'account_name' => 'Okekwe Rita Chinyere',
            'account_number' => '5071013406',
            'bank_name' => 'Ecobank',
            'phone' => '08038862911',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);
        User::create([
            'username' => 'EmmanuelAgu',
            'email' => 'admin@mail.com',
            'awaiting_approval' => 'verified',
            'name' => 'Emmanuel Agu',
            'account_name' => 'Emmanuel Agu',
            'account_number' => '0217303144',
            'bank_name' => 'Gt Bank',
            'phone' => '09038472207',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);
        User::create([
            'username' => 'Trickazy',
            'email' => 'Tradersincome@protonmail.com',
            'awaiting_approval' => 'verified',
            'name' => 'Trickazy',
            'account_name' => 'Okwuchukwu james',
            'account_number' => '2073676601',
            'bank_name' => 'UBA',
            'phone' => '07052581691',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);
    }
}
