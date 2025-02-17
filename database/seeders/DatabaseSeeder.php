<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProvinceSeeder::class,
            RegencySeeder::class,
            DistrictSeeder::class,
            BankSeeder::class,
            SuperadminSeeder::class,
            AreaSeeder::class,
            HubSeeder::class,
            AdminSeeder::class,
            PaymentMethodSeeder::class,
            FinanceSeeder::class,
            CustomerSeeder::class,
            CustomerUmkmsSeeder::class,
            CourierSeeder::class,
            PartnershipSeeder::class,
            AgenSubmissionSeeder::class,
            AgenSeeder::class,
            ServicesProvidersSeeder::class,
            ServicesTypesSeeder::class,
            ServicesPricesSeeder::class,
            ParcelSeeder::class,
            MerchandiseSeeder::class,
            MerchandiseRequestSeeder::class,
            PartnershipTransactionSeeder::class,
            TopUpTransactionSeeder::class,
            PickUpRequestSeeder::class,
            PickUpScheduleSeeder::class,
            ParcelsReceiversSeeder::class,
            ParcelSendersSeeder::class,
            TempParcelSeeder::class,
            TempParcelReceiverSeeder::class,
            TempParcelSenderSeeder::class,
            TimelineSeeder::class,
            ParcelAssignmentSeeder::class,
            RateSeeder::class,
            CourierWithdrawalSeeder::class, 
            CourierSubmissionSeeder::class,
            CourierIncomeSeeder::class,
            PointTransactionSeeder::class,
        ]);
    }
}
