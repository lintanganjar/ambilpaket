<?php

namespace App\Http\Controllers\Customer\Web;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\CustomerService;

class ProfileController extends Controller
{
    private $customerService;

    public function __construct(
        CustomerService $customerService
    ) {
        $this->customerService = $customerService;
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $result = $this->customerService->getCustomerDetail($user['customer']->id);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'postal_code',
            'full_address',
            'point',
            'profile_img',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->customerService->updateCustomerData($user['customer']->id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
}
