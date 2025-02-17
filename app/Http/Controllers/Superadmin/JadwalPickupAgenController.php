<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PickupSchedule\PickupScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\LaravelPackageTools\Package;

class JadwalPickupAgenController extends Controller
{
    private $pickupScheduleService;

    public function __construct(PickupScheduleService $pickupScheduleService)
    {
        $this->pickupScheduleService = $pickupScheduleService;
    }

    public function index(Request $request)
    {
        try {
            $jadwal = $this->pickupScheduleService->getAllPickupScheduleWithSearch($request);

            return response()->json([
                "Success" => true,
                "Code" => 200,
                "Data" => $jadwal
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "Success" => false,
                "Code" => 500,
                "Message" => $e->getMessage()
            ], 500);
        }
    }


}
