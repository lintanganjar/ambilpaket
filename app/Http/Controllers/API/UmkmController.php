<?php

namespace App\Http\Controllers\API;

use App\Services\PickupRequest\PickupRequestService;
use Exception;
use Illuminate\Http\Request;
use App\Services\Umkm\UmkmService;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;

class UmkmController extends \App\Http\Controllers\Controller
{
    // Umkm Services || PickUp Request Service
    private $umkmService, $pickupRequestService;

    public function __construct(
        UmkmService $umkmService,
        PickupRequestService $pickupRequestService,
    ) {
        $this->umkmService = $umkmService;
        $this->pickupRequestService = $pickupRequestService;
    }

    public function updateUmkmCompany(Request $request)
    {
        $user = Auth::user();

        if ($user->role == "UMKM") {
            $data = $request->only([
                'company_name',
                'province_id',
                'regency_id',
                'district_id',
                'full_address',
                'latitude',
                'longitude',
            ]);

            try {
                $result = [
                    'success' => true,
                    'code' => 200,
                    'data' => $this->umkmService->updateUmkmData($user['customerUmkm']->id, $data)
                ];
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'code' => 500,
                    'error' => $e->getMessage()
                ];
            }
        } else {
            $result = [
                'success' => false,
                'code' => 403,
                'error' => "Akses ditolak. Hanya pengguna dengan peran UMKM yang dapat melakukan tindakan ini."
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function getDetailUmkmPickUpRequestByCustomerUmkmId()
    {
        $user = Auth::user();

        if ($user->role == "UMKM") {
            $pickupRequestService = $this->pickupRequestService->getPickupRequestDetailByCustomerUmkmId($user['customerUmkm']->id);

            if (!$pickupRequestService) {
                return response()->json([
                    'success' => false,
                    'code' => 200,
                    'message' => 'Data pickup tidak ditemukan.',
                    'data' => [],
                ], 200);
            }

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil ditemukan',
                'data' => $pickupRequestService,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Akses ditolak. Hanya pengguna dengan peran UMKM yang dapat melakukan tindakan ini.',
            ], 403);
        }
    }

    public function postUmkmPickUpRequest(Request $request)
    {
        $user = Auth::user();

        if ($user->role == "UMKM") {
            $data = array_merge(
                $request->only([
                    'parcel_average_per_day',
                    'parcel_type',
                    'days_of_pickup',
                    'time_of_pickup',
                ]),
                ['customer_umkm_id' => $user['customerUmkm']->id],
                ['status' => "Menunggu"],
            );

            try {
                $dataUmkm = [
                    'product_type' => null,
                    'parcel_average_per_day' => null,
                    'days_of_pickup' => null,
                    'time_of_pickup' => null
                ];

                $dataPickup = $this->pickupRequestService->storePickupRequest($data);
                $this->umkmService->updateUmkmData($user['customerUmkm']->id, $dataUmkm);

                $result = [
                    'success' => true,
                    'code' => 200,
                    'data' => $dataPickup,
                ];
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'code' => 500,
                    'error' => $e->getMessage()
                ];
            }
        } else {
            $result = [
                'success' => false,
                'code' => 403,
                'error' => "Akses ditolak. Hanya pengguna dengan peran UMKM yang dapat melakukan tindakan ini."
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function updateUmkmPickUp(Request $request)
    {
        $user = Auth::user();

        if ($user->role == "UMKM") {
            $data = $request->only([
                'pickup_activation',
            ]);

            try {
                $dataUmkm = $this->umkmService->updateUmkmData($user['customerUmkm']->id, $data);

                if ($dataUmkm == true) {
                    $dataPickup = $this->umkmService->getUmkmDetail($user['customerUmkm']->id);

                    $result = [
                        'success' => true,
                        'code' => 200,
                        'data' => $dataPickup,
                    ];
                }
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'code' => 500,
                    'error' => $e->getMessage()
                ];
            }
        } else {
            $result = [
                'success' => false,
                'code' => 403,
                'error' => "Akses ditolak. Hanya pengguna dengan peran UMKM yang dapat melakukan tindakan ini."
            ];
        }

        return response()->json($result, $result['code']);
    }
}
