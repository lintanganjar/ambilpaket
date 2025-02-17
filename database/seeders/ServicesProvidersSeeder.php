<?php

namespace Database\Seeders;

use App\Models\ServicesProviders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesProvidersSeeder extends Seeder
{
    public function run(): void
    {        
        $serviceProviders =[
                    'Jalur Nugraha Ekakurir (JNE)' => 'jne', 'POS Indonesia (POS)' => 'pos', 
                    'Citra Van Titipan Kilat (TIKI)' => 'tiki', 'RPX Holding (RPX)' => 'rpx', 
                    'Pandu Express' => 'pandu', 'Wahana Prestasi Logistik' => 'wahana', 
                    'SiCepat Express' => 'sicepat', 'J&T Express' => 'jnt', 
                    'Pahala Kencana Express' => 'pahala', 'Satria Antaran Prima' => 'sap', 
                    'JET Express' => 'jet', 'Indah Logistic' => 'indah', 
                    '21 Express' => 'dse', 'Solusi Ekspres' => 'slis', 
                    'Synergy First Logistics' => 'first', 'Nusantara Card Semesta' => 'ncs', 
                    'Star Cargo' => 'star', 'Ninja Xpress' => 'ninja', 
                    'Lion Parcel' => 'lion', 'Indotama Domestik Lestari' => 'idl', 
                    'Royal Express Indonesia' => 'rex', 'IDexpress Service Solution' => 'ide', 
                    'Sentral Cargo' => 'sentral', 'AnterAja' => 'anteraja', 
                    'JTL Express' => 'jtl'];

        foreach ($serviceProviders as $key => $value) {
            ServicesProviders::create([
                'name' => $key, 
                'courier_code' => $value,
                'logo' => "storage/app/img/services-providers/".$value.".jpg", // Logo image path
            ]);
        }
    }
}
