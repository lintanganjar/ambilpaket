<?php

namespace App\Http\Controllers\Agen\Penjemputan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PickupRequest\PickupRequestService;
use Illuminate\Support\Facades\Auth;
use Exception;

class PengajuanJadwalController extends Controller
{
    protected $pickupRequestService;

    public function __construct(PickupRequestService $pickupRequestService)
    {
        $this->pickupRequestService = $pickupRequestService;
    }

    public function index(Request $request)
    {
        try {
            $request->merge(['agen_id' => Auth::user()->id]);

            $data = $this->pickupRequestService->getAllPickupRequestWithSearch($request);
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

    public function accept($id)
    {
        try {
            $updatedData = $this->pickupRequestService->acceptRequest($id);
            
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Request berhasil diterima.',
                'Data' => $updatedData,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function decline($id)
    {
        try {
            $updatedData = $this->pickupRequestService->declineRequest($id);
            
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Request berhasil ditolak.',
                'Data' => $updatedData,
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
