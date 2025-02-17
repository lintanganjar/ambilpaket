<?php

namespace App\Http\Controllers\Agen\Penjemputan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PickupSchedule\PickupScheduleService;
use Illuminate\Support\Facades\Auth;
use Exception;

class JadwalPenjemputanController extends Controller
{
    protected $pickupScheduleService;

    public function __construct(PickupScheduleService $pickupScheduleService)
    {
        $this->pickupScheduleService = $pickupScheduleService;
    }

    public function index(Request $request)
    {
        try {
            $request->merge([
                'agen_id' => Auth::user()->agen->id, 
            ]);

            $schedules = $this->pickupScheduleService->getAllPickupScheduleWithSearch($request);
            // return view('',['profile'=>$result]);
            return response()->json([
                'success' => true,
                'code' => 200,
                'data' => $schedules,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
