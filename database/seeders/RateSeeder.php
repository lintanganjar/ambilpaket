<?php

namespace Database\Seeders;

use App\Models\Rate;
use App\Models\Parcels;
use App\Models\Couriers;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID parcel yang tersedia
        $parcelIds = Parcels::pluck('id')->toArray();
        $kurirIds = Couriers::pluck('id')->toArray();
        foreach ($parcelIds as $parcelId) {
            // Cek apakah parcel_id sudah ada di tabel parcel_senders
            if (Rate::where('parcel_id', $parcelId)->exists()) {
                continue; // Jika sudah ada, lanjut ke iterasi berikutnya
            }

             // Pilih kurir secara acak dari daftar kurir yang ada
             $kurirId = $faker->randomElement($kurirIds);

            Rate::create([
                'parcel_id' => $parcelId,
                'kurir_id' => $kurirId,
                'expedition_rate' => $faker->randomFloat(2, 1000, 10000),
                'expedition_comment' => $faker->sentence,
                'kurir_rate' => $faker->randomFloat(2, 1000, 10000),
                'kurir_comment' => $faker->sentence,
            ]);
        }
    }
}
