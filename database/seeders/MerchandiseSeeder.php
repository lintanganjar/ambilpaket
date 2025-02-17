<?php

namespace Database\Seeders;

use App\Models\Merchandise;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MerchandiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        for ($i = 0; $i < 10; $i++) {
        
        $merchandiseNames = [
            'baju', 'gantungan kunci', 'sendal', 'tumbler', 
            'topi', 'tas', 'stiker', 'gelas', 'dompet', 'notebook'
        ];

        for ($i = 0; $i < 10; $i++) {
            $merchandiseName = $faker->randomElement($merchandiseNames);
            
            Merchandise::create([
                'name' => $merchandiseName, // Use the randomly selected name
                'stock' => $faker->numberBetween(10, 100), 
                'merchandise_img' => "asset/img/" . str_replace(' ', '_', strtolower($merchandiseName)) . ".jpg", // Use the name in the image path
                'point' => $faker->numberBetween(100, 1000), 
                'available' => true, 
            ]);
        }
        }
    }
}
