<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\Regency\RegencyService;

class RegencyController extends \App\Http\Controllers\Controller
{
    private $regencyService;
    public function __construct(
        RegencyService $regencyService,
    ) {
        $this->regencyService = $regencyService;
    }
    public function getAllRegencySearch (Request $request){
        try {
            $result = $this->regencyService->getAllRegencyWithSearch($request);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'List Kabupaten dan Kota Berhasil Ditemukan',
                'data' => $result,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Tidak dapat memeriksa list Kabupaten dan Kota, harap periksa inputan Anda',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
