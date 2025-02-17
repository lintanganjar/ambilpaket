<?php

namespace Database\Seeders;

use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use App\Models\TempParcel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\TempParcelSender;
use App\Models\TempParcelReceiver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TempParcelSenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID temp parcel yang tersedia
        $tempParcelIds = TempParcel::pluck('id')->toArray();

        // Ambil semua ID provinsi, kabupaten, dan kecamatan yang tersedia
        $provinceIds = Province::pluck('id')->toArray();
        $regencyIds = Regency::pluck('id')->toArray();
        $districtIds = District::pluck('id')->toArray();

        foreach ($tempParcelIds as $tempParcelId) {
            // Cek apakah parcel_id sudah ada di tabel temp_parcel_receivers
            if (TempParcelSender::where('parcel_id', $tempParcelId)->exists()) {
                continue; // Jika sudah ada, lanjut ke iterasi berikutnya
            }
            // Pilih province, regency, dan district acak dari tabel
            $provinceId = $faker->randomElement($provinceIds);

            // Ambil regency berdasarkan province yang dipilih
            $regencyId = Regency::where('province_id', $provinceId)->pluck('id')->toArray();
            if (empty($regencyId)) continue; // Jika tidak ada regency, lanjut ke iterasi berikutnya
            $regencyId = $faker->randomElement($regencyId);

            // Ambil district berdasarkan regency yang dipilih
            $districtId = District::where('regency_id', $regencyId)->pluck('id')->toArray();
            if (empty($districtId)) continue; // Jika tidak ada district, lanjut ke iterasi berikutnya
            $districtId = $faker->randomElement($districtId);

            // Generate nomor telepon dengan panjang antara 11-13 digit dan awalan 08
            $phoneNumber = '08' . $faker->numerify(str_repeat('#', rand(9, 11)));

            TempParcelSender::create([
                'parcel_id' => $tempParcelId,
                'sender_first_name' => $faker->firstName,
                'sender_last_name' => $faker->lastName,
                'sender_phone_number' => $phoneNumber,
                'sender_email' => $faker->safeEmail,
                'sender_province_id' => $provinceId,
                'sender_regency_id' => $regencyId,
                'sender_district_id' => $districtId,
                'sender_postal_code' => $faker->numerify('#####'),
                'sender_full_address' => $faker->streetAddress . ', ' . $faker->city,
            ]);
        }
    }
}
