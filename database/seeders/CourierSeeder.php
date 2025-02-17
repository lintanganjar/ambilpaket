<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\User;
use App\Models\Regency;
use App\Models\Couriers;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $areas = Area::all();

        $user = User::create([
            'username' => 'courier',
            'email' => "courier@courier.com",
            'password' => bcrypt('password'), 
            'role' => 'courier',
            'banned' => 0,
            'ban_reason' => null,
        ]);        

        $area = $areas->first();

        Couriers::create([
            'user_id' => $user->id,
            'courier_type' => $faker->randomElement(['Delivery', 'Pickup']),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'phone_number' => $faker->phoneNumber,
            'gender' => $faker->randomElement(['Pria', 'Wanita']),
            'profile_img' => "asset/img/{$faker->firstName}.jpg",
            'area_id' => $area->id,
            'balance' => $faker->numberBetween(0, 1000),
            'bank_name' => $faker->randomElement(['BANK BCA', 'BANK BNI', 'BANK BRI', 'BANK MANDIRI']),
            'account_name' => $faker->firstName . ' ' . $faker->lastName,
            'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))), 
        ]);

        foreach ($areas as $area) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $username = $firstName . $lastName;

            $user = User::create([
                'username' => $username,
                'email' => "{$username}@courier.com",
                'password' => bcrypt('password'), 
                'role' => 'courier',
                'banned' => 0,
                'ban_reason' => null,
            ]);

            $phoneNumber = $faker->phoneNumber;

            $profileImg = "asset/img/{$firstName}.jpg";

            Couriers::create([
                'user_id' => $user->id,
                'courier_type' => $faker->randomElement(['Delivery', 'Pickup']),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'phone_number' => $phoneNumber,
                'gender' => $faker->randomElement(['Pria', 'Wanita']),
                'profile_img' => $profileImg,
                'area_id' => $area->id,
                'balance' => $faker->numberBetween(0, 1000),
                'bank_name' => $faker->randomElement(['BANK BCA', 'BANK BNI', 'BANK BRI', 'BANK MANDIRI']),
                'account_name' => $firstName . ' ' . $lastName,
                'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))), 
            ]);
        }
    }
}
