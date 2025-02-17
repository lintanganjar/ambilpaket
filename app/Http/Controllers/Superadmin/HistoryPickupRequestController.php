<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PickupRequest\PickupRequestService;
use Illuminate\Http\Request;

class HistoryPickupRequestController extends Controller
{
    private $pickupRequestService;

    public function __construct(PickupRequestService $pickupRequestService)
    {
        $this->pickupRequestService = $pickupRequestService;
    }

    public function index(Request $request)
    {
        try {
            $history = $this->pickupRequestService->getAssignedPickupRequests($request);

            return response()->json([
                "Success" => true,
                "Code" => 200,
                "Data" => $history
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
