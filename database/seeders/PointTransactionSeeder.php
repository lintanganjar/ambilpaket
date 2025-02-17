<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\PointTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PointTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereIn('role', ['customer', 'umkm'])->get();

        foreach ($users as $user) {
            $transactionType = array_rand(['earn' => 'earn', 'redeem' => 'redeem']);

            PointTransaction::create([
                'user_id' => $user->id,
                'transaction_type' => $transactionType,
                'amount' => rand(100, 1000),
            ]);
        }
    }
}
