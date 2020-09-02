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
            'account_name' => 'Emmanuel Agu',
            'account_number' => '0217303144',
            'bank_name' => 'Gt Bank',
            'phone' => '09038472207',
            'created_by' => 'Seeded'

        ]);
        Admin::create([
            'account_name' => 'Emmanuel Destiny Ekechukwu',
            'account_number' => '0024361229',
            'bank_name' => 'Zenith Bank',
            'phone' => '08084593359',
            'created_by' => 'Seeded'


        ]);
        Admin::create([
            'account_name' => 'Okekwe Rita Chinyere',
            'account_number' => '5071013406',
            'bank_name' => 'Ecobank',
            'phone' => '08038862911',
            'created_by' => 'Seeded'

        ]);
        Admin::create([
            'account_name' => 'Dara Amasco',
            'account_number' => '3107285938',
            'bank_name' => 'First Bank',
            'phone' => '08038085117',
            'created_by' => 'Seeded'

        ]);
        Admin::create([
            'account_name' => 'Maria Thomas',
            'account_number' => '2104043970',
            'bank_name' => 'UBA',
            'phone' => '09060031829',
            'created_by' => 'Seeded'

        ]);
    }
}
