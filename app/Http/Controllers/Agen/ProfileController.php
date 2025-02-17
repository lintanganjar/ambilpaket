<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use Illuminate\Support\Facades\Auth;
use Exception;

class ProfileController extends Controller
{
    private $agenService;

    public function __construct(AgenService $agenService)
    {
        $this->agenService = $agenService;
    }

    public function profile()
    {
        try {
            $result = $this->agenService->getAgenDetail(Auth::user()->agen->id);
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
            'partnership_id',
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'building_type',
            'building_status',
            'location',
            'latitude',
            'longitude',
            'balance',
            'bank_name',
            'account_name',
            'account_number',
            'profile_img'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];

        try {
            $this->agenService->updateAgenData(Auth::user()->agen->id, $data);
            
            $updatedData = $this->agenService->getAgenDetail(Auth::user()->agen->id);
            
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
