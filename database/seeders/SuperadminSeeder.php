<?php

namespace Database\Seeders;

use App\Models\Province;
use App\Models\Superadmin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Get a random province
        $province = Province::inRandomOrder()->first();

        // Get a random regency from the selected province
        $regency = $province ? $province->regencies()->inRandomOrder()->first() : null;

        // Get a random district from the selected regency
        $district = $regency ? $regency->districts()->inRandomOrder()->first() : null;

        // Get an address detail from province, regency, and district
        $namaJalan = $faker->streetName;
        $nomorRumah = $faker->buildingNumber;
        $addressDetail = $district && $regency && $province
            ? "Jl. {$namaJalan}, No. {$nomorRumah}, {$district->name}, {$regency->name}, {$province->name}"
            : null;

        // Generate a fake name
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;

        // Create a username by concatenating first and last names
        $username = strtolower("{$firstName}{$lastName}");

        // Create the user
        $user = User::create([
            'username' => $username,
            'email' => "{$username}@superadmin.com",
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'banned' => 0,
            'ban_reason' => null,
        ]);

        // Create the SuperAdmin
        Superadmin::create([
            'user_id' => $user->id,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'phone_number' => $faker->phoneNumber,
            'province_id' => $province?->id,
            'regency_id' => $regency?->id,
            'district_id' => $district?->id,
            'full_address' => $addressDetail,
            'profile_img' => "asset/img/{$firstName}.jpg",
        ]);
    }
}
