<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;
use App\Models\CourierSubmission;
use App\Models\User;
use Faker\Factory as Faker;

class CourierSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $areas = Area::all();

        $courierSubmissions = [];

        foreach (range(1, 5) as $index) { 
            $area = $areas->random();

            $firstName = $faker->firstName;
            $lastName = $faker->lastName;

            $courierSubmissions[] = [
                'courier_type' => $faker->randomElement(['Delivery', 'Pickup']),
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => strtolower("{$firstName}.{$lastName}@courier.com"), // Custom email format
                'phone_number' => $faker->phoneNumber,
                'gender' => $faker->randomElement(['Pria', 'Wanita']),
                'profile_img' => "asset/img/profile/{$firstName}.jpg",
                'area_id' => $area->id,
                'balance' => $faker->numberBetween(0, 1000000),
                'bank_name' => $faker->randomElement(['BCA', 'BNI', 'BRI', 'Mandiri']),
                'account_name' => strtoupper("{$firstName} {$lastName}"),
                'account_number' => $faker->numerify(str_repeat('#', rand(10, 15))),
                'approval' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        CourierSubmission::insert($courierSubmissions);
    }
}
