<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PickupRequest\PickupRequestService;
use Illuminate\Http\Request;

class PengajuanPickUpUmkmController extends Controller
{
    protected $pickupRequestService;

    public function __construct(PickupRequestService $pickupRequestService)
    {
        $this->pickupRequestService = $pickupRequestService;
    }

    // Mendapatkan pengajuan pick-up berdasarkan area Admin-HUB
    public function getPickupRequestsInAdminHubArea(Request $request)
    {
        // Menentukan area Admin-HUB (misalnya berdasarkan parameter yang diterima)
        $adminHubArea = [
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
        ];

        try {
            // Panggil service untuk mendapatkan pengajuan pick-up berdasarkan area
            $pickupRequests = $this->pickupRequestService->getPickupRequestsInSameArea($adminHubArea);

            // Tampilkan hasil
            return response()->json([
                'status' => 'success',
                'data' => $pickupRequests,
            ]);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to retrieve pickup requests in the same area.',
            ], 500);
        }
    }

    public function assignPickupToAgent(Request $request, $id)
    {
        $validated = $request->validate([
            'agen_id' => 'required|exists:agens,id',
        ]);

        try {
            // Panggil service untuk meneruskan pengajuan ke agen
            $updatedRequest = $this->pickupRequestService->assignToAgent($id, $validated['agen_id']);

            return response()->json([
                'status' => 'success',
                'data' => $updatedRequest,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $pickupRequests = $this->pickupRequestService->getAllPickupRequestWithSearch($request);
        // dd($pickupRequests);
        return view('pages.admin-hub.pickup.pengajuan-pickup-umkm.index',compact('pickupRequests'));
    }
}
