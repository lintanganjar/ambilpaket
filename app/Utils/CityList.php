<?php

namespace App\utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class CityList
{
    public static function getCity()
    {
        $response = Http::timeout(30)
        ->withHeaders([
            'key' => '23559312c2b82c849fede60848527e37',
            'content-type' => 'application/x-www-form-urlencoded',
        ])
        ->get('https://pro.rajaongkir.com/api/city');
        
        $city = []; 
        $result = $response['rajaongkir']['results'];
        foreach ($result as $r) {
            array_push($city,(object)[
                "cityId" => $r['city_id'],
                "cityName" => $r['city_name'],
                "provinceName" => $r['province']
            ]); 
        }
        if (isset($city)) {
            usort($city, function($first, $second){
                return strtolower($first->provinceName) > strtolower($second->provinceName);
            });
            return $city;
        }
        return $result;
    }
}