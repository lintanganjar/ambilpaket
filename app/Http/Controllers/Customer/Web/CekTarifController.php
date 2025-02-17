<?php

namespace App\Http\Controllers\Customer\Web;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Ongkir\OngkirService;

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
            $result = [
                'Success' => false,
                'Code' => 400,
                'Error' => $e->getMessage(),
            ];
        }
        // return view('',['listOngkir'=>$result]);
        return response()->json([
            'Result' => $result,
            'Data' => $data,
        ]);
    }
}
