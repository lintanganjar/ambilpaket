<?php

namespace Database\Seeders;

use App\Models\Merchandise;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\MerchandiseRequest;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerchandiseRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $merchandises = Merchandise::all();
        $users = User::all();

        $note = [
            'Tolong kirim selama jam kerja.',
            'Saya lebih suka varian biru.',
            'Harap ditangani dengan hati-hati.',
            'Apakah ini tersedia dalam ukuran lain?.'
        ];

        for ($i = 0; $i < 10; $i++) {
            MerchandiseRequest::create([
                'merchandise_id' => $merchandises->random()->id, // Randomly select a merchandise_id
                'user_id' => $users->random()->id, // Randomly select a user_id
                'status' => 'Menunggu Konfirmasi',
                'request_date' => $faker->date(),
                'amount' => $faker->numberBetween(1, 5),
                'note' => $faker->randomElement($note), // Optional note
                'approval' => $faker->optional()->boolean, // Sometimes true, false, or null
            ]);
        }
    }
}
