<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Umkm\UmkmService;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    protected $umkmService;

    public function __construct(UmkmService $umkmService)
    {
        $this->umkmService = $umkmService;
    }

    // Metode untuk mendapatkan UMKM berdasarkan area Admin-HUB
    public function getUMKMsInAdminHubArea(Request $request)
    {
        $adminHubArea = [
            'province_id' => $request->input('province_id'),  
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
        ];

        try {
            $umkms = $this->umkmService->getUMKMsInSameArea($adminHubArea);

            return response()->json([
                'status' => 'success',
                'data' => $umkms,
            ]);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to retrieve UMKM in the same area.',
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $umkms = $this->umkmService->getAllUmkmWithSearch($request);
        return view('pages.admin-hub.data-master.data-umkm.index', compact('umkms'));
    }
}
