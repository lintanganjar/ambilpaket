<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\utils\ResiNumber;
use App\Models\TempParcel;
use Faker\Factory as Faker;
use App\Models\CustomerUmkms;
use App\Models\ServicesPrices;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TempParcelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua ID yang tersedia dari tabel terkait
        $customerIds = Customer::pluck('id')->toArray();
        $customerUmkmIds = CustomerUmkms::pluck('id')->toArray();
        $servicePriceIds = ServicesPrices::pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            $startDays = rand(1, 5);
            $endDays = rand($startDays + 1, 10);

            TempParcel::create([
                'temp_resi_number' => ResiNumber::generateTempResiNumber(),
                'customer_id' => $faker->randomElement($customerIds),
                'customer_umkm_id' => $faker->randomElement($customerUmkmIds),
                'price' => $faker->randomFloat(2, 5000, 100000),
                'item_type' => $faker->randomElement(['Barang', 'Dokumen']),
                'item_name' => $faker->words(3, true),
                'amount' => $faker->numberBetween(1, 100),
                'weight' => $faker->randomFloat(2, 0.1, 50),
                'item_height' => $faker->numberBetween(1, 100),
                'item_width' => $faker->numberBetween(1, 100),
                'item_length' => $faker->numberBetween(1, 100),
                'note' => 'Catatan Pengiriman ' . $index,
                'service_price_id' => $faker->randomElement($servicePriceIds),
                'estimation_date' => $startDays . " - " . $endDays . " Hari",
            ]);
        }
    }
}
