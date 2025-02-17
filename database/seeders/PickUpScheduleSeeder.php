<?php

namespace Database\Seeders;

use App\Models\Agen;
use App\Models\CustomerUmkms;
use App\Models\Parcels;
use App\Models\PickUpRequest;
use App\Models\PickUpSchedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PickUpScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $requests = PickUpRequest::all();
        for ($i = 0; $i < 10; $i++) {
            $agens = Agen::inRandomOrder()->first();
            $customers = CustomerUmkms::where('regency_id',$agens->regency_id)->get(); 
            PickUpSchedule::create([
                'request_id' => $requests->random()->id, // Randomly select an pick_up_request_id
                'agen_id' => $agens->id, // Randomly select an agen_id
                'customer_umkm_id' => $customers->random()->id, // Randomly select a customer_umkm_id
            ]);
        }
    }
}
