<?php

namespace Database\Seeders;

use App\Models\Parcels;
use App\Models\Timeline;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID parcel yang tersedia
        $parcelIds = Parcels::pluck('id')->toArray();

        foreach ($parcelIds as $parcelId) {
            // Catat status "Masuk"
            Timeline::create([
                'parcel_id' => $parcelId,
                'date' => $faker->dateTimeBetween('-1 years', '-6 months'), // Paket masuk antara 1 tahun hingga 6 bulan lalu
                'detail' => 'Paket telah ditandai masuk.',
            ]);

            // Catat status "Keluar"
            Timeline::create([
                'parcel_id' => $parcelId,
                'date' => $faker->dateTimeBetween('-6 months', 'now'), // Paket keluar antara 6 bulan lalu hingga sekarang
                'detail' => 'Paket telah ditandai keluar.',
            ]);
        }
    }
}
