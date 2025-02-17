<?php

namespace Database\Seeders;

use App\Models\PaymentMethods;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $banks = [
            'BCA', 'BNI', 'BRI', 'Mandiri', 
            'CIMB Niaga', 'Permata', 'Danamon',
            'Bank Mega', 'BTN', 'Bank Syariah Indonesia'
        ];

        foreach ($banks as $bank) {
            PaymentMethods::create([
                'bank_name' => $bank,
                'account_name' => strtoupper($faker->name),
                'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))), // Nomor rekening antara 10-15 digit
            ]);
        }
    }
}
