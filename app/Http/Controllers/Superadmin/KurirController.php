<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Courier\CourierService;
use App\Services\CourierCommission\CourierCommissionService;
use App\Services\User\UserService;
use Exception;

class KurirController extends Controller
{
    private $courierService, $couriercommissionService, $userService;

    public function __construct(
        CourierService $courierService,
        CourierCommissionService $couriercommissionService,
        UserService $userService)
    {
        $this->courierService = $courierService;
        $this->couriercommissionService = $couriercommissionService;
        $this->userService = $userService; 
    }


    public function index(Request $request)
    {
        try {
            $result = $this->courierService->getAllCouriersWithSearch($request);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function createCourier(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',  
        ]);

        $dataCourier = $request->only([
            'courier_type',
            'first_name',
            'last_name',
            'phone_number',
            'gender',
            'profile_img',
            'area_id',
            'balance',
            'bank_name',
            'account_name',
            'account_number',
        ]);

        try {
            $role = 'courier';
            $user = $this->userService->createUserWithRole($dataUser, $role);

            $dataCourier['user_id'] = $user->id;
            $result = $this->courierService->storeCourierData($dataCourier);

            return response()->json([
                'Success' => true,
                'Code' => 201,
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function showDetailCourier($id)
    {
        try {
            $result = $this->courierService->getDetailCourier($id);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function courierWithdrawal(Request $request)
    {
        try {
            $result = $this->couriercommissionService->courierWithdrawal($request);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function courierWithdrawalHistory(Request $request)
    {
        try {
            $result = $this->couriercommissionService->courierWithdrawalHistory($request);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function acceptCourierWithdrawal($id)
    {
        try {
            $result = $this->couriercommissionService->acceptCourierWithdrawal($id);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function declineCourierWithdrawal($id)
    {
        try {
            $result = $this->couriercommissionService->declineCourierWithdrawal($id);
            return response()->json([
                'Success' => true, 
                'Code' => 200, 
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->courierService->deleteCourierData($id);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Courier data deleted successfully.',
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