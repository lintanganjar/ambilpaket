<?php

namespace Database\Seeders;

use App\Models\Agen;
use App\Models\User;
use App\Models\Province;
use Faker\Factory as Faker;
use App\Models\Partnerships;
use App\Models\AgenSubmissions;
use App\Models\Regency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $regencies = Regency::where('province_id', 33)->limit(5)->get();
        $submissions = AgenSubmissions::all();
        $partnerships = Partnerships::all();

        foreach ($regencies as $regency) {

            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $username = strtolower("{$firstName}.{$lastName}");

            $user = User::create([
                'username' => $username,
                'email' => "{$firstName}.{$lastName}@agen.com",
                'password' => bcrypt('password'),
                'role' => 'agen',
                'banned' => 0,
                'ban_reason' => null,
            ]);

            // Randomly select province and then regency and district
            $districts = $regency->districts;
            $randomDistrict = $districts->isNotEmpty() ? $districts->random() : 'Default District';
            
            $namaJalan = $faker->streetName;
            $nomorRumah = $faker->buildingNumber;
            $addressDetail = "Jl. {$namaJalan}, No. {$nomorRumah}, {$randomDistrict->name}, {$regency->name}, {$regency->province->name}";

            Agen::create([
                'partnership_id' => $partnerships->random()->id,
                'submission_id' => $submissions->random()->id,
                'user_id' => $user->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $faker->phoneNumber,
                'province_id' => $regency->province->id,
                'regency_id' => $regency->id,
                'district_id' => $randomDistrict->id ? $randomDistrict->id : null,
                'full_address' => $addressDetail,
                'building_type' => $faker->randomElement(['Ruko', 'Rumah Pribadi', 'Apartemen']),
                'building_status' => $faker->randomElement(['Sewa', 'Milik Pribadi']),
                'location' => $faker->randomElement(['Pusat Kota', 'Pinggir Kota', 'Pedalaman']),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'balance' => $faker->numberBetween(1, 10) * 10000,
                'bank_name' => $faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
                'account_name' => strtoupper($firstName . ' ' . $lastName),
                'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))),
                'profile_img' => "asset/img/profile/{$firstName}.jpg",
            ]);
        }
    }
}
