<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PickupRequest\PickupRequestService;
use Illuminate\Http\Request;

class RiwayatPengajuanPickUpController extends Controller
{
    protected $pickupRequestService;
    public function __construct(PickupRequestService $pickupRequestService)
    {
        $this->pickupRequestService = $pickupRequestService;
    }
    public function index(Request $request){
        $riwayat_pengajuan_pickup = $this->pickupRequestService->getAllPickupRequestWithSearch($request);
        return view('pages.admin-hub.pickup.riwayat-pengajuan-pickup.index', compact('riwayat_pengajuan_pickup'));
    }
}
