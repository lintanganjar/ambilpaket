<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\District\DistrictService;

class DistrictController extends \App\Http\Controllers\Controller
{
    private $districtService;
    public function __construct(
        DistrictService $districtService,
    ) {
        $this->districtService = $districtService;
    }
    public function getAllDistrictSearch (Request $request){
        try {
            $result = $this->districtService->getAllDistrictWithSearch($request);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'List Kecamatan Berhasil Ditemukan',
                'data' => $result,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Tidak dapat memeriksa list Kecamatan, harap periksa inputan Anda',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
