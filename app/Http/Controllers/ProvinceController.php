<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\Province\ProvinceService;

class ProvinceController extends \App\Http\Controllers\Controller
{
    private $provinceService;
    public function __construct(
        ProvinceService $provinceService,
    ) {
        $this->provinceService = $provinceService;
    }
    public function getAllProvinceSearch (Request $request){
        try {
            $result = $this->provinceService->getAllProvinceWithSearch($request);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'List Provinsi Berhasil Ditemukan',
                'data' => $result,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Tidak dapat memeriksa Provinsi, harap periksa inputan Anda',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
