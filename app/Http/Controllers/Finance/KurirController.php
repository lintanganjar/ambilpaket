<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\Courier\CourierService;
use App\Services\CourierCommission\CourierCommissionService;
use Illuminate\Http\Request;

class KurirController extends Controller
{
    private $courierService, $couriercommissionService;

    public function __construct(
        CourierService $courierService,
        CourierCommissionService $couriercommissionService,)
    {
        $this->courierService = $courierService;
        $this->couriercommissionService = $couriercommissionService;
    }

    public function index(Request $request)
    {
        $result = $this->courierService->getAllCouriersWithSearch($request);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }

    public function showDetailCourier($id)
    {
        $result = $this->courierService->getDetailCourier($id);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }

    public function courierWithdrawal(Request $request)
    {
        $result = $this->couriercommissionService->courierWithdrawal($request);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }

    public function courierWithdrawalHistory(Request $request)
    {
        $result = $this->couriercommissionService->courierWithdrawalHistory($request);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }

    public function acceptCourierWithdrawal($id)
    {
        $result = $this->couriercommissionService->acceptCourierWithdrawal($id);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }
    
    public function declineCourierWithdrawal($id)
    {
        $result = $this->couriercommissionService->declineCourierWithdrawal($id);
        return response()->json([
            'Success' => true, 
            'Code' => 200, 
            'data' => $result
        ]);
    }


}
