<?php

namespace Database\Seeders;

use League\Csv\Reader;
use App\Models\Regency;
use Illuminate\Database\Seeder;

class RegencySeeder extends Seeder
{
    public function run()
    {
        $filePath = public_path('db_assets/regencies.csv');
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $records = collect($csv->getRecords());

        $records->chunk(512)->each(function ($chunk) {
            $data = $chunk->map(function ($record) {
                return [
                    'id' => $record['id'],
                    'province_id' => $record['province_id'],
                    'name' => $record['name'],
                ];
            })->toArray();

            Regency::insert($data);
        });
    }
}
