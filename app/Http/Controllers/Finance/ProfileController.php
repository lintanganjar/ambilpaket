<?php

namespace App\Http\Controllers\Finance;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Finance\FinanceService;
use App\Services\SProvider\SProviderService;
use Exception;

class ProfileController extends Controller
{
    private $financeService;

    public function __construct(FinanceService $financeService)
    {
        $this->financeService = $financeService;
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        $result = $this->financeService->getFinanceDetail($user['finance']->id);
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
            'full_address',
            'profile_img',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->financeService->updateFinanceData($user['finance']->id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }
        
        // return view('',['result'=>$result]); -> better to redirect to profile
        return response()->json($result);
    }
}
