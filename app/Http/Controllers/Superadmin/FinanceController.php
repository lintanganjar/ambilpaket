<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Finance\FinanceService;
use App\Services\User\UserService;
use Exception;

class FinanceController extends Controller
{
    private $financeService;
    private $userService;

    public function __construct(FinanceService $financeService, UserService $userService)
    {
        $this->financeService = $financeService;
        $this->userService = $userService; 
    }

    public function index(Request $request)
    {
        try {
            $data = $this->financeService->getAllFinanceWithSearch($request);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $data,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $dataFinance = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'profile_img',
        ]);

        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);

        try {
            $role = 'finance';
            $user = $this->userService->createUserWithRole($dataUser, $role);

            $dataFinance['user_id'] = $user->id;
            $finance = $this->financeService->storeFinanceData($dataFinance);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $finance,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'profile_img',
        ]);

        try {
            $finance = $this->financeService->updateFinanceData($id, $data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $finance,
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
            $this->financeService->deleteFinanceData($id);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Finance data deleted successfully.',
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
