<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\PickupRequest\PickupRequestService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PickupRequestUmkmController extends Controller
{
    protected $pickupRequestService;

    public function __construct(PickupRequestService $pickupRequestService)
    {
        $this->pickupRequestService = $pickupRequestService;
    }

    public function index(Request $request)
    {
        try {
            $pickupRequests = $this->pickupRequestService->getAllPickupRequestWithSearch($request);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'data' => $pickupRequests
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }
    public function assignToAgent(Request $request, $id)
    {
        Log::info("Assign to Agent Request received for Pickup Request ID: {$id}");

        $validated = $request->validate([
            'agen_id' => 'required|exists:agens,id',
        ]);

        try {
            Log::info('Validation completed. Attempting to assign to agent...');

            $updatedRequest = $this->pickupRequestService->assignToAgent($id, $validated['agen_id']);

            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $updatedRequest,
            ], 200);
        } catch (\Throwable $e) {
            Log::error("Error occurred while assigning pickup request ID {$id} to agent: " . $e->getMessage());

            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => 'Failed to assign request to agent. Please try again later.',
            ], 500);
        }
    }
}
