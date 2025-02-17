<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Superadmin\SuperadminService;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProfileController extends Controller
{
    private $superadminService;

    public function __construct(SuperadminService $superadminService)
    {
        $this->superadminService = $superadminService;
    }

    public function profile()
    {
        try {
            $result = $this->superadminService->getSuperadminDetail(Auth::user()->superadmin->id);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'profile_img'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];

        try {
            $this->superadminService->updateSuperadminData(Auth::user()->superadmin->id, $data);
            
            $updatedData = $this->superadminService->getSuperadminDetail(Auth::user()->superadmin->id);
            
            $result['Data'] = $updatedData;
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }
}
