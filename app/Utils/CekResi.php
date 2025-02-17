<?php

namespace App\utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class CekResi
{

    public static function CekResi($data)
    {
        // Cek apakah kurir menggunakan Binderbyte (wahana atau rpx)
        if (self::isBinderbyteCourier($data['courier'])) {
            return self::cekResiBinderbyte($data);
        } else {
            return self::cekResiRajaOngkir($data);
        }
    }
    private static function isBinderbyteCourier($courier)
    {
        return in_array(strtolower($courier), ['wahana', 'rpx']);
    }

    public static function CekResiRajaOngkir($data)
    {
        $response = Http::timeout(30)
            ->asForm()
            ->withHeaders([
                'key' => '23559312c2b82c849fede60848527e37',
                'content-type' => 'application/x-www-form-urlencoded',
            ])
            ->post('https://pro.rajaongkir.com/api/waybill', [
                'waybill' => $data['resi'],
                'courier' => $data['courier'],
            ]);
        $response = json_decode($response, true);
        $response = $response['rajaongkir'];
        if ($response['status']['code']!=200) {
            return $response['status'];
        }else { 
            $result['status'] = Str::lower($response['result']['delivery_status']['status']); 
            $result['code']= $response['status']['code'];
            if ($response['result']['manifest']!=null) {
                foreach (array_reverse($response['result']['manifest']) as $timeline) {
                    if (!$timeline['city_name']) {
                      $result['timeline'] [] = [
                        'date' => $timeline['manifest_date'],
                        'detail' => $timeline['manifest_description'],
                      ];
                    }else {
                        $result['timeline'] [] = [
                        'date' => $timeline['manifest_date'],
                        'detail' => $timeline['manifest_description'].' ['.$timeline['city_name'].']',
                      ];
                    }
                }
            }
            return $result;
        }
    }

    private static function cekResiBinderbyte($data)
    {
        $response = Http::timeout(30)
            ->withHeaders([
                'content-type' => 'application/x-www-form-urlencoded',
            ])
            ->get('https://api.binderbyte.com/v1/track', [
                'api_key' => '080cede4a179e01a45435ec36a3875949473f31819a15fbf717a29142570272d',
                'courier' => $data['courier'],
                'awb' => $data['resi'],
            ]);

        $responseData = $response->json();

        if (isset($responseData['data']['history'])) {
            $result['status'] = Str::lower($responseData['data']['summary']['status']);
            $result['code']= $responseData['status'];
            if ($responseData['data']['summary']['courier']=='Wahana Express') {
                foreach (array_reverse($responseData['data']['history']) as $history) {
                    if (!isset($history['location']) || empty($history['location'])) {
                        $result['timeline'][] = [
                            'date' => $history['date'],
                            'detail' => $history['desc'],
                        ];
                    } else {
                        $result['timeline'][] = [
                            'date' => $history['date'],
                            'detail' => $history['desc'] . ' [' . $history['location'] . ']',
                        ];
                    }
                }
            } else {
                foreach ($responseData['data']['history'] as $history) {
                    if (!isset($history['location']) || empty($history['location'])) {
                        $result['timeline'][] = [
                            'date' => $history['date'],
                            'detail' => $history['desc'],
                        ];
                    } else {
                        $result['timeline'][] = [
                            'date' => $history['date'],
                            'detail' => $history['desc'] . ' [' . $history['location'] . ']',
                        ];
                    }
                }
            }
            return $result;
        } else {
            return $responseData['status'];
        }
    }
}
