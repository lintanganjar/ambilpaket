<?php

namespace Database\Seeders;

use League\Csv\Reader;
use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $filePath = public_path('db_assets/provinces.csv');
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $records = collect($csv->getRecords());

        $records->chunk(34)->each(function ($chunk) {
            $data = $chunk->map(function ($record) {
                return [
                    'id' => $record['id'],
                    'name' => $record['name'],
                ];
            })->toArray();

            Province::insert($data);
        });
    }
}
