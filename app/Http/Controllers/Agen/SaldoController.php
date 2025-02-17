<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use App\Services\TopUpTransaction\TopUpTransactionService; 
use Illuminate\Support\Facades\Auth;
use Exception;

class SaldoController extends Controller
{
    protected $agenService;
    protected $topUpTransactionService;

    public function __construct(AgenService $agenService, TopUpTransactionService $topUpTransactionService)
    {
        $this->agenService = $agenService;
        $this->topUpTransactionService = $topUpTransactionService;
    }

    public function showCurrentBalance(Request $request)
    {
        try {
            $agen_id = Auth::user()->agen->id;

            $agen = $this->agenService->getAgenDetail($agen_id);

            $data = [
                'agen_id' => $agen->id,
                'current_balance' => $agen->balance ?? 0, 
            ];
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function topup(Request $request)
    {
        $data = $request->only([
            'amount',
            'payment_method_id',
        ]);

        $data['agen_id'] = Auth::user()->agen->id;

        $data['request_status'] = 'Pending';

        try {
            $transaction = $this->topUpTransactionService->storeTopUpTransactionData($data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $transaction,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }
}
