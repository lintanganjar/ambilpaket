<?php

namespace App\Http\Controllers\UMKM\Web;

use App\Http\Controllers\Controller;
use App\Services\Ongkir\OngkirService;
use Exception;
use Illuminate\Http\Request;

class CekTarifController extends Controller
{
    private $ongkirService;

    public function __construct(OngkirService $ongkirService)
    {
        $this->ongkirService = $ongkirService;
    }

    public function cekTarif(Request $request)
    {
        $data = $request->only([
            'origin',
            'destination',
            'weight',
        ]);
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['price']= $this->ongkirService->cekOngkir($data);
        } catch (Exception $e) {
            $result= [
                'Success' => false,
                'Code' => 400,
                'Error' => $e->getMessage(),
            ];
        }
        //return view('',['listOngkir'=>$result]);
        return response()->json([
            'Result' => $result,
            'Data' => $data,
        ]);
    }
}