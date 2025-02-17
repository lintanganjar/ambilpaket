<?php

namespace Database\Seeders;

use App\Models\AgenSubmissions;
use App\Models\Regency;
use App\Models\District;
use App\Models\Province;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgenSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get a list of provinces
        $provinces = Province::all(); 

        for ($i = 0; $i < 10; $i++) {
            // Randomly select province and its regencies and districts
            $province = $provinces->random();
            $regencies = $province->regencies; // Assuming there's a relationship defined
            $regency = $regencies->random();
            $districts = $regency->districts; // Assuming there's a relationship defined
            $district = $districts->isNotEmpty() ? $districts->random() : null;

            // Generate the first and last name for naming images and email
            $firstName = $faker->firstName;
            $lastName = $faker->lastName; 

            // Create full address based on selected province, regency, and district
            $addressDetail = "Jl. {$faker->streetName}, No. {$faker->buildingNumber}, ";
            $addressDetail .= $district ? "{$district->name}, {$regency->name}, {$province->name}" : "{$regency->name}, {$province->name}";

            AgenSubmissions::create([
                'agen_first_name' => $firstName,
                'agen_last_name' => $lastName,
                'agen_phone_number' => $faker->phoneNumber,
                'agen_email' => strtolower("{$firstName}.{$lastName}@agensubmission.com"), // Custom email format
                'agen_password' => bcrypt('password'), // Use a secure password
                'agen_province_id' => $province->id,
                'agen_regency_id' => $regency->id,
                'agen_district_id' => $district ? $district->id : null,
                'agen_full_address' => $addressDetail,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'building_type' => $faker->randomElement(['Ruko', 'Rumah Pribadi', 'Apartemen']),
                'building_status' => $faker->randomElement(['Sewa', 'Milik Pribadi']),
                'location' => $faker->randomElement(['Pusat Kota', 'Pinggir Kota', 'Pedalaman']),
                'ktp_img' => "asset/img/agen-docs/ktp/{$firstName}.jpg",
                'npwp_img' => "asset/img/npwp/{$firstName}.jpg",
                'akta_pendiri_perusahaan_img' => "asset/img/agen-docs/akta/{$firstName}.jpg",
                'suket_domisili_usaha_img' => "asset/img/agen-docs/suket/{$firstName}.jpg",
                'surat_izin_usaha_perusahaan_img' => "asset/img/agen-docs/surat-izin/{$firstName}.jpg",
                'location_img' => "asset/img/agen-docs/location/{$firstName}.jpg",
                'building_condition_img' => "asset/img/agen-docs/building-condition/{$firstName}.jpg",
                'approval' => false, 
                'bank_name' => $faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
                'account_name' => strtoupper($firstName . ' ' . $lastName),
                'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))), // Random account number
            ]);
        }
    }
}
