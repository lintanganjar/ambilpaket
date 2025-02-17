<?php

namespace App\Http\Controllers\UMKM\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Merch\MerchService;
use App\Services\MerchRequest\MerchRequestService;
use App\Services\Umkm\UmkmService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PoinController extends Controller
{
    private $merchService, $umkmService, $merchRequestService;

    public function __construct(
        MerchService $merchService,
        UmkmService $umkmService,
        MerchRequestService $merchRequestService
    ) {
        $this->merchService = $merchService;
        $this->umkmService = $umkmService;
        $this->merchRequestService = $merchRequestService;
    }

    public function index()
    {
        $result = $this->umkmService->getUmkmDetail(Auth::user()->id);
        // return view('',['profile'=>$result['point']]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result['point'] ?? null
        ]);
    }

    public function showMerch(Request $request)
    {
        $result = $this->merchService->getAllMerchWithSearch($request);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function showMerchDetail($id)
    {
        $result = $this->merchService->getMerchDetail($id);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function claimMerch(Request $request)
    {
        $userId = Auth::id();

        if (!$userId) {
            return response()->json(['error' => 'User tidak ditemukan'], 401);
        }

        $user = User::findOrFail($userId);
        $customerId = $user->customer->id ?? null;

        $data = $request->validate([
            'merchandise_id' => 'required|integer',
            'status' => 'required|string',
            'amount' => 'required|integer',
            'note' => 'nullable|string',
        ]);

        $data['request_date'] = now();
        $data['customer_id'] = $customerId;

        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'data' => $this->merchRequestService->storeRequestMerchData($data)
            ];
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
}
