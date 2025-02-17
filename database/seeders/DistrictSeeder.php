<?php

namespace Database\Seeders;

use League\Csv\Reader;
use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $filePath = public_path('db_assets/districts.csv');
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $records = collect($csv->getRecords());

        $records->chunk(7215)->each(function ($chunk) {
            $data = $chunk->map(function ($record) {
                return [
                    'id' => $record['id'],
                    'regency_id' => $record['regency_id'],
                    'name' => $record['name'],
                ];
            })->toArray();

            District::insert($data);
        });
    }
}
