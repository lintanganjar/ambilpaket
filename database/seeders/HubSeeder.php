<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Hubs;
use App\Models\Regency;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class HubSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');        

        $areas = Area::all();

        foreach ($areas as $area) {
            $regency = Regency::where('id',$area->regency_id)->first();
            $district = $regency ? $regency->districts()->inRandomOrder()->first() : null;
            
            $namaJalan = $faker->streetName;
            $nomorRumah = $faker->buildingNumber;
            $addressDetail = "Jl. {$namaJalan}, No. {$nomorRumah}, {$district->name}, {$regency->name}, {$regency->province->name}";

            Hubs::create([
                'area_id' => $area->id,
                'name' => 'Kantor Cabang '.$regency->name,
                'province_id' => $regency->province_id,
                'regency_id' => $regency->id ,
                'district_id' => $district->id,
                'full_address' => $addressDetail,
                'latitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
                'longitude' => $faker->numberBetween(-144,144).'.'.$faker->numerify('#######'),
            ]);
        }
    }
}
