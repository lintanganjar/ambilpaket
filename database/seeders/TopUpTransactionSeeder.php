<?php

namespace Database\Seeders;

use App\Models\Agen;
use Faker\Factory as Faker;
use App\Models\PaymentMethods;
use Illuminate\Database\Seeder;
use App\Models\TopUpTransactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TopUpTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        $agens = Agen::all();
        $paymentMethods = PaymentMethods::all();

        for ($i = 0; $i < 10; $i++) {
            TopUpTransactions::create([
                'agen_id' => $agens->random()->id, // Randomly select an agen_id
                'amount' => $faker->numberBetween(1, 10) * 10000,
                'payment_method_id' => $paymentMethods->random()->id, // Randomly select a payment_method_id
                'request_status' => $faker->randomElement(['Sukses', 'Pending', 'Ditolak']), // Random request status
            ]);
        }
    }
}
