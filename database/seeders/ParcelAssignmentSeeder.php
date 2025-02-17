<?php

namespace Database\Seeders;

use App\Models\Couriers;
use App\Models\Parcels;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\ParcelAssignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParcelAssignmentSeeder extends Seeder
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
            if (ParcelAssignment::where('parcel_id', $parcelId)->exists()) {
                continue; // Jika sudah ada, lanjut ke iterasi berikutnya
            }

            // Pilih kurir secara acak dari daftar kurir yang ada
            $kurirId = $faker->randomElement($kurirIds);

            ParcelAssignment::create([
                'assignment_date' => $faker->dateTimeBetween('-1 years', 'now'),
                'kurir_id' => $kurirId,
                'parcel_id' => $parcelId,
                'status_reason' => $faker->sentence(),
                'status' => $faker->randomElement(['Berhasil', 'Gagal']),
            ]);
        }
    }
}
