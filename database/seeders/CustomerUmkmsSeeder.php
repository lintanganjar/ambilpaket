<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Regency;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\CustomerUmkms;
use Illuminate\Database\Seeder;

class CustomerUmkmsSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');        

        $regencies = Regency::where('province_id', 33)->limit(10)->get();

        $user = User::create([
            'username' => 'umkm',
            'email' => "umkm@umkm.com",
            'password' => bcrypt('password'),
            'role' => 'umkm',
            'banned' => 0,
            'ban_reason' => null,
        ]);

        $dayArray = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];
        $randomDays = Arr::random($dayArray, 3);

        $regency = $regencies->first();

        CustomerUmkms::create([
            'user_id' => $user->id,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'phone_number' =>$faker->phoneNumber(),
            'company_name' => $faker->company(),
            'product_type' => $faker->randomElement(['Sembako','Pakaian','Buku','Perlengkapan Sekolah']),
            'province_id' => $regency->province->id,
            'regency_id' => $regency->id,
            'district_id' => $regency->districts->random()->id,
            'full_address' => "Jl. {$faker->streetName}, No. {$faker->buildingNumber}, {$regency->districts->random()->name}, {$regency->name}, {$regency->province->name}",
            'point' => $faker->randomNumber(5,false),
            'latitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
            'longitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
            'parcel_average_per_day' => $faker->numberBetween(10,119),
            'pickup_activation' => true,
            'days_of_pickup' => json_encode($randomDays),
            'time_of_pickup' => $faker->time(),
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

            $dayArray = [
                'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
            ];
            // Get random days from the input array.
            $randomDays = Arr::random($dayArray, 3);
            $randomDays_tojson = json_encode($randomDays);

            // Get Random Category
            $randomProductType = $faker->randomElement(['Sembako','Pakaian','Buku','Perlengkapan Sekolah']);
            $user = User::create([
                'username' => $username,
                'email' => "{$username}@umkm.com",
                'password' => bcrypt('password'),
                'role' => 'umkm',
                'banned' => 0,
                'ban_reason' => null,
            ]);
            CustomerUmkms::create([
                'user_id' => $user->id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' =>$faker->phoneNumber(),
                'company_name' => $faker->company(),
                'product_type' => $randomProductType,
                'province_id' => $regency->province->id,
                'regency_id' => $regency->id,
                'district_id' => $randomDistrict->id,
                'full_address' => $addressDetail,
                'point' => $faker->randomNumber(5,false),
                'latitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
                'longitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
                'parcel_average_per_day' => $faker->numberBetween(10,119),
                'pickup_activation' => true,
                'days_of_pickup' => $randomDays_tojson,
                'time_of_pickup' => $faker->time(),
                'profile_img' => "asset/img/".$firstName.".jpg",
            ]);
        }
    }
}   