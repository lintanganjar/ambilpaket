<?php

namespace App\Http\Controllers\Customer\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Merch\MerchService;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\CustomerService;
use App\Services\MerchRequest\MerchRequestService;
use Exception;

class PoinController extends Controller
{
    private $merchService, $customerService , $merchRequestService;

    public function __construct(
        MerchService $merchService,
        CustomerService $customerService,
        MerchRequestService $merchRequestService,
    ) {
        $this->merchService = $merchService;
        $this->customerService = $customerService;
        $this->merchRequestService = $merchRequestService;
    }
    public function index()
    {
        $result = $this->customerService->getCustomerDetail(Auth::user()->id);
        // return view('',['profile'=>$result['point']]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result['point']
        ]);
    }

    public function showMerch(Request $request)
    {
        $result = $this->merchService->getAllMerchWithSearch($request);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function showMerchDetail($id)
    {
        $result = $this->merchService->getMerchDetail($id);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function claimMerch(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->only([
            'merchandise_id',
            'status',
            'amount',
            'note'
        ]);
        $data['request_date']= now();
        $data['customer_id'] = $user['customer']->id;
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchRequestService->storeRequestMerchData($data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }
        // return view('',['profile'=>$result]); -> recommend redirect to trade history page 
        return response()->json($result, $result['Code']);
    }

}
