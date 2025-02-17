<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\Agen\AgenService;
use App\Services\TopUpTransaction\TopUpTransactionService;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    private $agenService, $topUpTransactionService;

    public function __construct(
        AgenService $agenService,
        TopUpTransactionService $topUpTransactionService,)
    {
        $this->agenService = $agenService;
        $this->topUpTransactionService = $topUpTransactionService;
    }

    public function index(Request $request)
    {
        $result = $this->agenService->getAllAgenWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function showDetailAgen($id)
    {
        $result = $this->agenService->getAgenDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    
    public function topUpSaldo(Request $request)
    {
        $data = $this->topUpTransactionService->topUpSaldo($request);
        return response()->json($data);
    }
    
    public function topUpSaldoHistory(Request $request)
    {
        $data = $this->topUpTransactionService->topUpSaldoHistory($request);
        return response()->json($data);
    }
    
    public function acceptTopUpSaldo($id)
    {
        $data = $this->topUpTransactionService->acceptTopUpSaldo($id);
        return response()->json($data);
    }
    
    public function declineTopUpSaldo($id)
    {
        $data = $this->topUpTransactionService->declineTopUpSaldo($id);
        return response()->json($data);
    }
}
