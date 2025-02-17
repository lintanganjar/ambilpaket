<?php

namespace Database\Seeders;

use App\Models\Agen;
use Faker\Factory as Faker;
use App\Models\Partnerships;
use App\Models\PaymentMethods;
use Illuminate\Database\Seeder;
use App\Models\PartnershipTransactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnershipTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        $agens = Agen::all();
        $partnerships = Partnerships::all();
        $paymentMethods = PaymentMethods::all();

        for ($i = 0; $i < 10; $i++) {
            // Randomly select from and into partnership IDs
            $fromPartnership = $faker->optional()->randomElement($partnerships->pluck('id')->toArray());
            $intoPartnership = $partnerships->random()->id;

            $intoPartnershipPrice = Partnerships::find($intoPartnership)->price;

            // Set the amount to the price of the partnership 
            $amount = $intoPartnershipPrice;

            PartnershipTransactions::create([
                'agen_id' => $agens->random()->id, 
                'amount' => $amount, // Use the price as amount
                'from_partnership_id' => $fromPartnership, 
                'into_partnership_id' => $intoPartnership,
                'payment_method_id' => $paymentMethods->random()->id, 
                'request_status' => $faker->randomElement(['Sukses', 'Pending', 'Ditolak']), 
            ]);
        }
    }
}
