<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use App\Services\PartnershipTransactions\PartnershipTransactionsService;
use Illuminate\Support\Facades\Auth;
use Exception;

class PaketKemitraanController extends Controller
{
    protected $agenService;
    protected $partnershipTransactionsService;

    public function __construct(AgenService $agenService, PartnershipTransactionsService $partnershipTransactionsService)
    {
        $this->agenService = $agenService;
        $this->partnershipTransactionsService = $partnershipTransactionsService;
    }

    public function showCurrentPackage(Request $request)
    {
        try {
            $agen_id = Auth::user()->agen->id;

            $agen = $this->agenService->getAgenDetail($agen_id);

            $data = [
                'agen_id' => $agen->id,
                'partnership_name' => $agen->partnership->name,
                'partnership_price' => $agen->partnership->price,
                'partnership_benefits' => json_decode($agen->partnership->other_benefits),
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

    public function upgradePackage(Request $request)
    {
        $data = $request->only([
            'into_partnership_id',
            'payment_method_id',
        ]);

        $data['agen_id'] = Auth::user()->agen->id;

        $agen = $this->agenService->getAgenDetail($data['agen_id']);

        $data['from_partnership_id'] = $agen && $agen->partnership ? $agen->partnership->id : null;

        if ($agen && $agen->partnership) {
            $intoPartnership = $agen->partnership->find($data['into_partnership_id']);
            
            if ($intoPartnership) {
                $data['amount'] = $intoPartnership->price; 
            }
        }

        $data['request_status'] = 'Pending';

        try {
            $transaction = $this->partnershipTransactionsService->storePartnershipTransactionData($data);
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
