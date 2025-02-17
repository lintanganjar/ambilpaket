<?php

namespace Database\Seeders;

use App\Models\Couriers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourierWithdrawalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua data dari tabel courier
        $couriers = Couriers::all();

        foreach ($couriers as $courier) {
            DB::table('courier_withdrawal')->insert([
                'courier_id' => $courier->id,
                'amount' => rand(100000, 1000000),
                'bank_name' => $courier->bank_name,  
                'account_name' => $courier->account_name,  
                'account_number' => $courier->account_number,  
                'request_status' => ['Sukses', 'Pending', 'Ditolak'][array_rand(['Sukses', 'Pending', 'Ditolak'])],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
