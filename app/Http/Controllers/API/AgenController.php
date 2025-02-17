<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use App\Services\Umkm\UmkmService;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\CustomerService;

class AgenController extends \App\Http\Controllers\Controller
{
    private $agenService, $customerService, $customerUmkmService;

    public function __construct(
        AgenService $agenService,
        CustomerService $customerService,
        UmkmService $customerUmkmService,
    ) {
        $this->agenService = $agenService;
        $this->customerService = $customerService;
        $this->customerUmkmService = $customerUmkmService;
    }

    public function getAgenDetailByRegency()
    {
        $user = User::find(Auth::user()->id);

        switch ($user->role) {
            case 'Customer':
                $customer = $this->customerService->getCustomerDetail($user['customer']->id);
                $result = $this->agenService->getAgenDetailByRegencyId($customer->regency_id);

                if($result == null) {
                    return response()->json([
                        "Success" => false,
                        "Code" => 404,
                        "data" => "Agen Tidak Ditemukan Di Kabupaten/Kota Anda."
                    ]);
                }

                return response()->json([
                    "Success" => true,
                    "Code" => 200,
                    "data" => $result
                ]);
                break;
            case 'UMKM':
                $customerUmkm = $this->customerUmkmService->getUmkmDetail($user['customerUmkm']->id);
                $result = $this->agenService->getAgenDetailByRegencyId($customerUmkm->regency_id);

                if($result == null) {
                    return response()->json([
                        "Success" => false,
                        "Code" => 404,
                        "data" => "Agen Tidak Ditemukan Di Kabupaten/Kota Anda."
                    ]);
                }

                return response()->json([
                    "Success" => true,
                    "Code" => 200,
                    "data" => $result
                ]);
                break;
            default:
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'pesan' => "Role pengguna tidak valid.",
                ], 400);
                break;
        }
    }
}
