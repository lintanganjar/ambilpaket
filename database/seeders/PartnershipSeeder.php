<?php

namespace Database\Seeders;

use App\Models\Partnerships;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PartnershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $paketList = [
            'Premium',
            'Basic',
            'Standard',
            'Enterprise'
        ];

        $paketBenefits = [
            'Premium' => ['Gratis ongkir pertama', 'Pelacakan real-time', 'Asuransi pengiriman', 'Dukungan 24/7'],
            'Basic' => ['Gratis ongkir pertama', 'Pengambilan di tempat', 'Notifikasi status'],
            'Standard' => ['Pengiriman cepat', 'Diskon loyalitas', 'Pengiriman terjadwal'],
            'Enterprise' => ['Pelacakan real-time', 'Pengiriman terjadwal', 'Kemasan ramah lingkungan', 'Asuransi pengiriman']
        ];

        foreach ($paketList as $paket) {
            Partnerships::create([
                'name' => $paket,
                'price' => $faker->numberBetween(1, 10) * 10000,
                'commission' => $faker->numberBetween(1, 100),
                'other_benefits' => json_encode($paketBenefits[$paket])
            ]);
        }
    }
}
