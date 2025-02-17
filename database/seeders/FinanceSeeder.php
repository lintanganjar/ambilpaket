<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\User;
use App\Models\Finance;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            // Get a random province
            $province = Province::with('regencies.districts')->inRandomOrder()->first();

            // Get a random regency from the selected province
            $regency = $province ? $province->regencies->random() : null;

            // Get a random district from the selected regency
            $district = $regency && $regency->districts->isNotEmpty() ? $regency->districts->random() : null;

            // Generate a fake name
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            // Create a username by combining first and last name
            $username = strtolower($firstName.$lastName);

            // Create the user
            $user = User::create([
                'username' => $username,
                'email' => "{$username}@finance.com",
                'password' => bcrypt('password'),
                'role' => 'finance',
                'banned' => 0,
                'ban_reason' => null,
            ]);

            // Generate full address if district, regency, and province are available
            $addressDetail = $district && $regency && $province
                ? "Jl. {$faker->streetName}, No. {$faker->buildingNumber}, {$district->name}, {$regency->name}, {$province->name}"
                : null;

            // Create the Finance
            Finance::create([
                'user_id' => $user->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $faker->phoneNumber(),
                'province_id' => $province ? $province->id : null,
                'regency_id' => $regency ? $regency->id : null,
                'district_id' => $district ? $district->id : null,
                'full_address' => $addressDetail,
                'profile_img' => "asset/img/profile/{$firstName}.jpg", //profile image path
            ]);
        }
    }
}
