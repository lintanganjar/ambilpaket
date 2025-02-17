<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Hubs;
use App\Models\User;
use App\Models\Regency;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $hubs = Hubs::all();
        

        foreach ($hubs as $hub) {
            $regency = Regency::where('province_id', 33)->limit(1)->get();
            foreach ($regency as $regency) {
                $districts = $regency->districts;
                $randomDistrict = $districts->isNotEmpty() ? $districts->random() : 'Default District';
                
                $namaJalan = $faker->streetName;
                $nomorRumah = $faker->buildingNumber;
                $addressDetail = "Jl. {$namaJalan}, No. {$nomorRumah}, {$randomDistrict->name}, {$regency->name}, {$regency->province->name}";

                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
                $username = $firstName.$lastName;
                $user = User::create([
                    'username' => $username,
                    'email' => "{$username}@adminregency.com",
                    'password' => bcrypt('password'),
                    'role' => 'admin',
                    'banned' => 0,
                    'ban_reason' => null,
                ]);

                Admin::create([
                    'user_id' => $user->id,
                    'hub_id' => $hub->id,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'phone_number' => $faker->phoneNumber(),
                    'province_id' => $regency->province->id,
                    'regency_id' => $regency->id,
                    'district_id' => $randomDistrict->id,
                    'full_address' => $addressDetail,
                    'profile_img' => "asset/img/".$firstName.".jpg",
                ]);
            }
            
        }
    }
}
