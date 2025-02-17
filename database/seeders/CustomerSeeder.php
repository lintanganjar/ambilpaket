<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use App\Models\Regency;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');        

        $regencies = Regency::where('province_id', 33)->limit(20)->get();

        $user = User::create([
            'username' => 'customer',
            'email' => "customer@customer.com",
            'password' => bcrypt('password'),
            'role' => 'customer',
            'banned' => 0,
            'ban_reason' => null,
        ]);

        $regency = $regencies->first();

        Customer::create([
            'user_id' => $user->id,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'phone_number' =>$faker->phoneNumber(),
            'province_id' => $regency->province->id,
            'regency_id' => $regency->id,
            'district_id' => $regency->districts->random()->id,
            'postal_code' => $faker->postcode(),
            'full_address' => "Jl. {$faker->streetName}, No. {$faker->buildingNumber}, {$regency->districts->random()->name}, {$regency->name}, {$regency->province->name}",
            'point' => $faker->randomNumber(5,false),
            'profile_img' => "asset/img/".$faker->firstName.".jpg",
        ]);

        foreach ($regencies as $regency) {
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
                'email' => "{$username}@customer.com",
                'password' => bcrypt('password'),
                'role' => 'customer',
                'banned' => 0,
                'ban_reason' => null,
            ]);
            Customer::create([
                'user_id' => $user->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' =>$faker->phoneNumber(),
                'province_id' => $regency->province->id,
                'regency_id' => $regency->id,
                'district_id' => $randomDistrict->id,
                'postal_code' => $faker->postcode(),
                'full_address' => $addressDetail,
                'point' => $faker->randomNumber(5,false),
                'profile_img' => "asset/img/".$firstName.".jpg",
            ]);
        }
    }
}
