<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PickupSchedule\PickupScheduleService;
use Illuminate\Http\Request;

class JadwalPickUpAgenController extends Controller
{
    protected $pickupScheduleService;

    public function __construct(PickupScheduleService $pickupScheduleService)
    {
        $this->pickupScheduleService = $pickupScheduleService;
    }
    public function getjadwalpickupagenInAdminHubArea(Request $request)
    {
        // Menentukan area Admin-HUB (misalnya berdasarkan parameter yang diterima)
        $adminHubArea = [
            'province_id' => $request->input('province_id'),
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
        ];

        try {
            $jadwalpickupagen = $this->getJadwalPickupAgenByArea($adminHubArea);

            // Tampilkan hasil
            return response()->json([
                'status' => 'success',
                'data' => $jadwalpickupagen,
            ]);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to retrieve pickup requests in the same area.',
            ], 500);
        }
    }

    public function index(Request $request){
        $jadwalpickupagen = $this->pickupScheduleService->getAllPickupScheduleWithSearch($request);
        // dd($jadwalpickupagen->toArray());
        return view('pages.admin-hub.pickup.jadwal-pickup-agen.index', compact('jadwalpickupagen'));
    }
}
