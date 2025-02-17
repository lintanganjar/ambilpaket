<?php

namespace Database\Seeders;

use App\Models\ParcelSenders;
use App\Models\Parcels;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ParcelSendersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Locale Indonesia

        // Ambil semua ID parcel yang tersedia
        $parcelIds = Parcels::pluck('id')->toArray();

        // Ambil semua ID provinsi, kabupaten, dan kecamatan yang tersedia
        $provinceIds = Province::pluck('id')->toArray();
        $regencyIds = Regency::pluck('id')->toArray();
        $districtIds = District::pluck('id')->toArray();

        foreach ($parcelIds as $parcelId) {
            // Cek apakah parcel_id sudah ada di tabel parcel_senders
            if (ParcelSenders::where('parcel_id', $parcelId)->exists()) {
                continue; // Jika sudah ada, lanjut ke iterasi berikutnya
            }

            // Pilih province, regency, dan district acak dari tabel
            $provinceId = $faker->randomElement($provinceIds);
            $regencyId = $faker->randomElement($regencyIds);
            $districtId = $faker->randomElement($districtIds);

            // Generate nomor telepon dengan panjang antara 11-13 digit dan awalan 08
            $phoneNumber = '08' . $faker->numerify(str_repeat('#', rand(9, 11)));

            // Buat entry baru dengan alamat spesifik Indonesia dan kode pos 5 digit
            ParcelSenders::create([
                'parcel_id' => $parcelId,
                'sender_first_name' => $faker->firstName,
                'sender_last_name' => $faker->lastName,
                'sender_phone_number' => $phoneNumber,
                'sender_email' => $faker->safeEmail,
                'sender_province_id' => $provinceId,
                'sender_regency_id' => $regencyId,
                'sender_district_id' => $districtId,
                'sender_postal_code' => $faker->numerify('#####'), // Kode pos 5 angka
                'sender_full_address' => $faker->streetAddress . ', ' . $faker->city, // Alamat Indonesia
            ]);
        }
    }
}
