<?php

namespace App\Http\Controllers\UMKM\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Umkm\UmkmService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $umkmService;

    public function __construct(UmkmService $umkmService)
    {
        $this->umkmService = $umkmService;
    }

    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return($user);
        $result = $this->umkmService->getUmkmDetail($user['customerUmkm']->id);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'company_name',
            'product_type',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude',
            'parcel_average_per_day',
            'pickup_activation',
            'days_of_pickup',
            'time_of_pickup,'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $user = User::findOrFail(Auth::user()->id);
            $result['Data'] = $this->umkmService->updateUmkmData($user['customerUmkm']->id, $data);
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