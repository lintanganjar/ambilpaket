<?php

namespace Database\Seeders;

use App\Models\ParcelsReceivers;
use App\Models\Parcels; // Pastikan Anda mengimpor model Parcels
use App\Models\Customer; // Pastikan Anda mengimpor model Customer
use App\Models\Province; // Pastikan Anda mengimpor model Province
use App\Models\Regency; // Pastikan Anda mengimpor model Regency
use App\Models\District; // Pastikan Anda mengimpor model District
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParcelsReceiversSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID parcel yang tersedia
        $parcelIds = Parcels::pluck('id')->toArray();

        // Ambil semua ID provinsi, kabupaten, dan kecamatan yang tersedia
        $provinceIds = Province::pluck('id')->toArray();
        $regencyIds = Regency::pluck('id')->toArray();
        $districtIds = District::pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            for ($i = 0; $i < 10; $i++) {
                // Pilih parcel_id secara acak dari daftar
                $parcelId = $faker->randomElement($parcelIds);

                // Cek apakah parcel_id sudah ada
                if (ParcelsReceivers::where('parcel_id', $parcelId)->exists()) {
                    continue; // Jika sudah ada, lanjut ke iterasi berikutnya
                }

                // Pilih province, regency, dan district acak dari tabel
                $provinceId = $faker->randomElement($provinceIds);
                $regencyId = $faker->randomElement($regencyIds);
                $districtId = $faker->randomElement($districtIds);

                // Generate nomor telepon dengan panjang antara 11-13 digit dan awalan 08
                $phoneNumber = '08' . $faker->numerify(str_repeat('#', rand(9, 11)));
                // Buat entry baru
                ParcelsReceivers::create([
                    'parcel_id' => $parcelId,
                    'reciever_first_name' => $faker->firstName,
                    'reciever_last_name' => $faker->lastName,
                    'reciever_phone_number' => $faker->phoneNumber,
                    'reciever_email' => $faker->safeEmail,
                    'reciever_province_id' => $provinceId,
                    'reciever_regency_id' => $regencyId,
                    'reciever_district_id' => $districtId,
                    'reciever_postal_code' => $faker->postcode,
                    'reciever_full_address' => $faker->streetAddress . ', ' . $faker->city,
                    'reciever_latitude' => null,
                    'reciever_longitude' => null,
                ]);
            }
        }
    }
}
