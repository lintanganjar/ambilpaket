<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\Bank\BankService;

class BankController extends Controller
{
    private $bankService;

    public function __construct(
        BankService $bankService,
    ) {
        $this->bankService = $bankService;
    }

    public function getAllBankSearch (Request $request){
        try {
            $result = $this->bankService->getAllBankWithSearch($request);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'List Bank Berhasil Ditemukan',
                'data' => $result,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Tidak dapat memeriksa Bank, harap periksa inputan Anda',
                'error' => $e->getMessage(),
            ], 400);
        }
    }
}
