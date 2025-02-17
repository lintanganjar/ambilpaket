<?php

namespace Database\Seeders;

use App\Models\Bank;
use League\Csv\Reader;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $filePath = public_path('db_assets/banks.csv');
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $records = collect($csv->getRecords());

        $records->chunk(82)->each(function ($chunk) {
            $data = $chunk->map(function ($record) {
                return [
                    'id' => $record['id'],
                    'name' => $record['name'],
                ];
            })->toArray();

            Bank::insert($data);
        });
    }
}
