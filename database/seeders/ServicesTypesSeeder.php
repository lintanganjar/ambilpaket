<?php

namespace Database\Seeders;

use App\Models\ServicesProviders;
use App\Models\ServicesTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceTypes = [
            'jne' => ['Reguler', 'YES', 'OKE', 'SPS'], 
            'pos' => ['Paket Kilat Khusus', 'Express Next Day', 'Paket Jumbo'], 
            'tiki' => ['Reguler','Economy Service','T15','T25','T60','Trucking'], 
            'rpx' => ['Reguler','Premium'], 
            'pandu' => ['Reguler','Cargo Darat'], 
            'wahana' => ['Express','Kargo','Ekonomis'], 
            'sicepat' => ['Reguler', 'Best', 'Cargo','Gokil','Siuntung'], 
            'jnt' => ['Reguler', 'EZ', 'Super'],
            'pahala' => ['Reguler', 'Same Day', 'Instant'],
            'sap' => ['Reguler','Cargo Darat'],
            'jet' => ['Reguler', 'Fast', 'COD'],
            'indah' => ['Reguler', 'Next Day', 'Sameday'],
            'dse' => ['ECO','Reguler'],
            'slis' => ['Express','Kargo','Ekonomis'],
            'first' => ['Reguler', 'Same Day', 'Instant'],
            'ncs' => ['Regular','One Night Service','Food-Regular Service','Darat'],
            'star' => ['Reguler'],
            'ninja' => ['Reguler', 'Fast', 'COD'],
            'lion' => ['Regular','Economy','Otomotive Shipping 150','Otomotive Shipping 250','Priority','Big Package'],
            'idl' => ['Express','Kargo','Ekonomis'],
            'rex' => ['Regular','Rex-10','Express'],
            'ide' => ['Reguler', 'Same Day', 'Instant'], 
            'sentral' => ['Darat Elektronik','Darat Non Elektronik'], 
            'anteraja' => ['Reguler', 'Next Day', 'Sameday'], 
            'jtl' => ['Reguler','Premium'],
        ];

        foreach ($serviceTypes as $providerCourier => $types) {
            $startDays = rand(1, 5);
            $endDays = rand($startDays + 1, 10);

            $serviceProvider = ServicesProviders::where('courier_code', $providerCourier)->first();

            if ($serviceProvider) {
                foreach ($types as $typeName) {
                    ServicesTypes::create([
                        'service_provider_id' => $serviceProvider->id,
                        'name' => $typeName,
                        'note' => $startDays . " - " . $endDays . " Hari",
                    ]);
                }
            }
        }
    }
}
