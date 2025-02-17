<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use App\Models\Regency;

class AreaSeeder extends Seeder
{
    public function run(): void
    {

        $regencies = Regency::where('province_id', 33)->limit(5)->get();

        foreach ($regencies as $regency) {
            $districts = $regency->districts;
            $randomDistrict = $districts->isNotEmpty() ? $districts->random(5) : 'Default District';
            $districtIds = $randomDistrict->pluck('id')->toArray();
            
            Area::create([
                'name' => 'Kantor Cabang '.$regency->name,
                'regency_id' => $regency->id ,
                'district_coverage' => json_encode($districtIds),
            ]);
        }
    }
}
