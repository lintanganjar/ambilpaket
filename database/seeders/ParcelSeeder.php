<?php

namespace Database\Seeders;

use App\Models\Agen;
use App\Models\Parcels;
use App\Models\Customer;
use Faker\Factory as Faker;
use App\Models\CustomerUmkms;
use App\Models\ServicesPrices;
use App\Utils\ResiNumber;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParcelSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $agens = Agen::all();
        $customers = Customer::all();
        $customerUmkms = CustomerUmkms::all();
        $servicePrices = ServicesPrices::all();

        $itemName = [
            'baju',
            'bahan makanan',
            'perabotan rumah',
            'leptop',
            'celana'
        ];
        $note = [
            'barang mudah pecah',
            'barang mudah terbakar',
            'barang mudah rusak'
        ];

        for ($i = 0; $i < 20; $i++) {

            $agen = $agens->random();
            $randomDecider = $faker->randomElement([1,1,1,2]);
            if ($randomDecider==2) {
                $customer = null;
                $customerUMKM = $customerUmkms->isNotEmpty() ? $customerUmkms->random() : null;
            } else {
                $customer = $customers->isNotEmpty() ? $customers->random() : null;
                $customerUMKM = null;
            }
            $servicePrice = $servicePrices->random();

            $dimensions = ['item_height', 'item_width', 'item_lenght'];
            shuffle($dimensions);

            $parcelData = [
                $dimensions[0] => $faker->optional()->numberBetween(1, 50),
                $dimensions[1] => $faker->numberBetween(1, 20),
                $dimensions[2] => $faker->numberBetween(1, 20),
            ];
            $resiNumber = ResiNumber::generateResiNumber();
            $actualResiNumber = $faker->randomElement([$resiNumber,$resiNumber,$resiNumber,'SOCAG'.$faker->numerify('###########')]);
            Parcels::create(array_merge([
                'resi_number' => $resiNumber,
                'actual_resi_number' => $actualResiNumber,
                'agen_id' => $agen->id,
                'customer_id' => $customer ? $customer->id : null,
                'customer_umkm_id' => $customerUMKM ? $customerUMKM->id : null,
                'price' => $faker->numberBetween(1, 10) * 10000,
                'agen_commission' => $faker->numberBetween(1, 10) * 10000,
                'item_type' => $faker->randomElement(['Barang', 'Dokumen']),
                'item_name' => $faker->randomElement($itemName),
                'amount' => $faker->numberBetween(1, 10),
                'weight' => $faker->numberBetween(1, 20),
                'note' => $faker->randomElement($note),
                'service_price_id' => $servicePrice->id,
                'estimation_date' => $faker->dateTimeBetween('now', '+3 days')->format('Y-m-d'),
                'receiver_origin' => null,
                'proof_img' => "asset/img/proof/proof_" . $faker->unique()->bothify('####') . ".jpg",
                'status' => $faker->randomElement(['Selesai', 'Gagal', 'Dalam Perjalanan']),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            ], $parcelData));

        }
        // For testing only (anter aja , Wahana, Rpx)
        $data = [
            '11000783697024' => '1832',
            'AGN42256' => '457',
            '799955509662' => '357'
        ];
        foreach ($data as $resi => $priceId) {
            $agen = $agens->random();
            $randomDecider = $faker->randomElement([1,1,1,2]);
            if ($randomDecider==2) {
                $customer = null;
                $customerUMKM = $customerUmkms->isNotEmpty() ? $customerUmkms->random() : null;
            } else {
                $customer = $customers->isNotEmpty() ? $customers->random() : null;
                $customerUMKM = null;
            }
            $servicePrice = $servicePrices->random();

            $dimensions = ['item_height', 'item_width', 'item_lenght'];
            shuffle($dimensions);

            $parcelData = [
                $dimensions[0] => $faker->optional()->numberBetween(1, 50),
                $dimensions[1] => $faker->numberBetween(1, 20),
                $dimensions[2] => $faker->numberBetween(1, 20),
            ];
            $resiNumber = ResiNumber::generateResiNumber();
            $actualResiNumber = $resi;
            Parcels::create(array_merge([
                'resi_number' => $resiNumber,
                'actual_resi_number' => $actualResiNumber,
                'agen_id' => $agen->id,
                'customer_id' => $customer ? $customer->id : null,
                'customer_umkm_id' => $customerUMKM ? $customerUMKM->id : null,
                'price' => $faker->numberBetween(1, 10) * 10000,
                'agen_commission' => $faker->numberBetween(1, 10) * 10000,
                'item_type' => $faker->randomElement(['Barang', 'Dokumen']),
                'item_name' => $faker->randomElement($itemName),
                'amount' => $faker->numberBetween(1, 10),
                'weight' => $faker->numberBetween(1, 20),
                'note' => $faker->randomElement($note),
                'service_price_id' => $priceId,
                'estimation_date' => $faker->dateTimeBetween('now', '+3 days')->format('Y-m-d'),
                'proof_img' => "asset/img/proof/proof_" . $faker->unique()->bothify('####') . ".jpg",
                'status' => $faker->randomElement(['Selesai', 'Gagal', 'Dalam Perjalanan']),
            ], $parcelData));
        }
    }
}
