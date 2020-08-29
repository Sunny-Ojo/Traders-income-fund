<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'account_name' => 'Sunny Ojo',
            'account_number' => '0224220580',
            'bank_name' => 'Guaranty Trust Bank',
            'phone' => '0812823216878',
            'created_by' => 'admin'

        ]);
        Admin::create([
            'account_name' => 'Chima Developer',
            'account_number' => '0058022422',
            'bank_name' => 'Zenith Bank',
            'phone' => '08128232778',
            'created_by' => 'admin'


        ]);
        Admin::create([
            'account_name' => 'Admin Ojo',
            'account_number' => '2058022420',
            'bank_name' => 'Access Bank',
            'phone' => '08128233878',
            'created_by' => 'admin'

        ]);
    }
}
