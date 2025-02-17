<?php

namespace Database\Seeders;

use App\Models\Regency;
use App\Models\ServicesPrices;
use Faker\Factory as Faker;
use App\Models\ServicesTypes;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $serviceTypes = ServicesTypes::all();
        $regencies = Regency::all();

        foreach ($serviceTypes as $serviceType) {
            // Ambil beberapa kota acak untuk kombinasi origin dan destination
            $originRegencies = $regencies->random(5); // Ambil 5 kota asal secara acak

            foreach ($originRegencies as $originRegency) {
                // Ambil 5 kota tujuan yang berbeda dengan kota asal
                $destinationRegencies = $regencies->where('id', '!=', $originRegency->id)->random(5);

                foreach ($destinationRegencies as $destinationRegency) {
                    ServicesPrices::create([
                        'service_type_id' => $serviceType->id,
                        'price' => $faker->numberBetween(1, 10) * 10000,
                        'origin_city' => $originRegency->name,
                        'destination_city' => $destinationRegency->name,
                    ]);
                }
            }
        }
    }
}
