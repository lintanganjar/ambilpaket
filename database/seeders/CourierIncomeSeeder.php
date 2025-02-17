<?php

namespace Database\Seeders;

use App\Models\Parcels;
use App\Models\Couriers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourierIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $couriers = Couriers::all();
        $parcels = Parcels::all();

        foreach (range(1, 10) as $index) {
            DB::table('courier_incomes')->insert([
                'courier_id' => $couriers->random()->id,
                'parcel_id' => $parcels->random()->id,
                'income' => rand(100000, 1000000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
