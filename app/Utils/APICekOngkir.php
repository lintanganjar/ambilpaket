<?php

namespace App\utils;
use Illuminate\Support\Facades\Http;

class APICekOngkir {
    public static function CekOngkir($data){ 
        $response = Http::timeout(30)
        ->asForm()
        ->withHeaders([
            'key' => '23559312c2b82c849fede60848527e37',
            'content-type' => 'application/x-www-form-urlencoded',
        ])
        ->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $data['origin'],
            'originType' => 'city',
            'destinationType' => 'city',
            'destination' => $data['destination'],
            'weight' => $data['weight'],
            'courier' => $data['courier'], 
        ]);
        $response=json_decode($response,true);
        return $response['rajaongkir']['results'];
    }
}