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
        // User::create([
        //     'name' => 'Sunny ojo',
        //     'username' => 'sunsil',
        //     'email' => 'sunny@mail.com',
        //     'referral_id' => 'N/A',
        //     'phone' => '08121225275',
        //     'account_name' => 'Sunny ojo',
        //     'account_number' => '0820225275',
        //     'awaiting_approval' => 'verified',

        //     'bank_name' => 'gtb',
        //     'password' => Hash::make('admin123'),
        //     'admin' => 0

        // ]);

        User::create([
            'name' => 'Sunny admin',
            'username' => 'sunshinecoder',
            'email' => 'admin@mail.com',
            'phone' => '08121225275',
            'awaiting_approval' => 'verified',
            'account_name' => 'Sunny ojo',
            'account_number' => '08121225275',
            'bank_name' => 'gtb',
            'password' => Hash::make('admin123'),
            'admin' => 1

        ]);
    }
}
