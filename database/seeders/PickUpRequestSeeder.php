<?php

namespace Database\Seeders;

use App\Models\Agen;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\CustomerUmkms;
use App\Models\PickUpRequest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickUpRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); 

        $reasons = [
            'Permintaan pengambilan barang.',
            'Tolong ambil pesanan saya.',
            'Urgent: Pengambilan diperlukan untuk acara.',
            'Permintaan untuk mengembalikan barang yang tidak terjual.',
            'Persiapan untuk pengiriman, perlu pengambilan barang.'
        ];

        $itemName = [
            'baju', 
            'bahan makanan', 
            'perabotan rumah', 
            'leptop', 
            'celana'
        ];

        for ($i = 0; $i < 10; $i++) {
            $dayArray = [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
            ];
            // Get random days from the input array.
            $randomDays = Arr::random($dayArray, 3);
            $randomDays_tojson = json_encode($randomDays);
            // get agen and customer with same regency
            $agens = Agen::inRandomOrder()->first();
            $customers = CustomerUmkms::where('regency_id', $agens->regency_id)->get(); 
            
            PickUpRequest::create([
                'customer_umkm_id' => $customers->random()->id, // Randomly select a customer_umkm_id
                'agen_id' => $agens->id, // Randomly select an agen_id or set null
                'parcel_average_per_day' => $faker->numberBetween(10,119),
                'parcel_type' => $faker->randomElement($itemName),
                'days_of_pickup' => $randomDays_tojson,
                'time_of_pickup' => $faker->time(),
                'reason' => $faker->randomElement($reasons), 
                'status' => $faker->randomElement(['Diterima', 'Menunggu', 'Ditolak']), // Random status
            ]);
        }
    }
}
