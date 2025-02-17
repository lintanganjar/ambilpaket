<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use App\Services\Merch\MerchService;
use Illuminate\Support\Facades\Auth;
use App\Services\MerchRequest\MerchRequestService;
use App\Services\PointTransaction\PointTransactionService;
use App\Services\Umkm\UmkmService;

class MerchController extends \App\Http\Controllers\Controller
{
    private $merchService, $merchRequestService, $pointTransactionService, $customerService, $umkmService;

    public function __construct(
        MerchService $merchService,
        MerchRequestService $merchRequestService,
        PointTransactionService $pointTransactionService,
        CustomerService $customerService,
        UmkmService $umkmService,
    ) {
        $this->merchService = $merchService;
        $this->merchRequestService = $merchRequestService;
        $this->pointTransactionService = $pointTransactionService;
        $this->customerService = $customerService;
        $this->umkmService = $umkmService;
    }

    public function getAllMerch(Request $request)
    {
        try {
            $user = User::where('id', Auth::user()->id)->with('customer', 'customerUmkm')->first();

            if ($user->role === 'Customer' || $user->role === 'UMKM') {
                $result = $this->merchService->getAllMerchWithSearch($request);

                $point = $user->role === 'Customer' ? $user->customer->point : $user->customerUmkm->point;

                $result = [
                    'success' => true,
                    'code' => 200,
                    'point' => $point,
                    'result' => $result,
                ];
            } else {
                $result = [
                    'success' => false,
                    'code' => 403,
                    'error' => "Akses ditolak. Hanya pengguna dengan peran Customer dan UMKM yang dapat melakukan tindakan ini."
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($result, $result['code']);
    }
    public function getDetailMerch(Request $request)
    {
        $id = $request->id;
        try {
            $user = User::where('id', Auth::user()->id)->with('customer', 'customerUmkm')->first();

            if ($user->role === 'Customer' || $user->role === 'UMKM') {
                $result = $this->merchService->getMerchDetail($id);

                $point = $user->role === 'Customer' ? $user->customer->point : $user->customerUmkm->point;

                $result = [
                    'success' => true,
                    'code' => 200,
                    'point' => $point,
                    'result' => $result,
                ];
            } else {
                $result = [
                    'success' => false,
                    'code' => 403,
                    'error' => "Akses ditolak. Hanya pengguna dengan peran Customer dan UMKM yang dapat melakukan tindakan ini."
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($result, $result['code']);
    }

    public function requestMerch(Request $request)
    {
        try {
            $user = User::where('id', Auth::user()->id)->with('customer', 'customerUmkm')->first();

            if ($user->role === 'Customer' || $user->role === 'UMKM') {
                $data = $request->only([
                    'merchandise_id',
                    'amount'
                ]);

                $oldPoint = $user->role === 'Customer' ? $user->customer->point : $user->customerUmkm->point;

                $merchDetail = $this->merchService->getMerchDetail($data['merchandise_id']);

                if ($merchDetail->available == 0) {
                    $result = [
                        'success' => false,
                        'code' => 404,
                        'error' => "Merchandise tidak tersedia."
                    ];
                } elseif ($data['amount'] > $merchDetail->stock) {
                    $result = [
                        'success' => false,
                        'code' => 400,
                        'error' => "Jumlah permintaan melebihi stok yang tersedia. Stok saat ini: {$merchDetail->stock}."
                    ];
                } else {
                    $totalPointDeduction = $merchDetail->point * $data['amount'];

                    $total['stock'] = $merchDetail->stock - $data['amount'];

                    $total['available'] = $total['stock'] == 0 ? false : true;

                    if ($user->role === 'Customer') {
                        $newPoint = $oldPoint - $totalPointDeduction;

                        if ($newPoint < 0) {
                            $result = [
                                'success' => false,
                                'code' => 200,
                                'error' => "Poin tidak mencukupi untuk melakukan permintaan merchandise."
                            ];
                        } else {
                            $result = $this->merchRequestService->storeRequestMerchData($data);

                            $merchStock = $this->merchService->updateMerchData($data['merchandise_id'], $total);

                            $newMerchDetail = $this->merchService->getMerchDetail($data['merchandise_id']);

                            $this->customerService->updateCustomerData($user->customer->id, [
                                'point' => $newPoint
                            ]);

                            $transactions = $this->pointTransactionService->storePointTransactionData([
                                'transaction_type' => 'redeem',
                                'amount' => $totalPointDeduction,
                            ]);
                        }
                    } elseif ($user->role === 'UMKM') {
                        $newPoint = $oldPoint - $totalPointDeduction;

                        if ($newPoint < 0) {
                            throw new Exception('Poin tidak mencukupi untuk melakukan permintaan merchandise.');
                        } else {
                            $result = $this->merchRequestService->storeRequestMerchData($data);

                            $merchStock = $this->merchService->updateMerchData($data['merchandise_id'], $total);

                            $newMerchDetail = $this->merchService->getMerchDetail($data['merchandise_id']);

                            $this->umkmService->updateUmkmData($user->customerUmkm->id, [
                                'point' => $newPoint
                            ]);

                            $transactions = $this->pointTransactionService->storePointTransactionData([
                                'transaction_type' => 'redeem',
                                'amount' => $totalPointDeduction,
                            ]);
                        }
                    }

                    $result = [
                        'success' => true,
                        'code' => 200,
                        'result' => [
                            'old_point' => $oldPoint,
                            'point' => $newPoint,
                            'merch' => $newMerchDetail->toArray(),
                            'merch_request' => $result->toArray(),
                            'transactions' => $transactions->toArray(),
                        ],
                    ];
                }
            } else {
                $result = [
                    'success' => false,
                    'code' => 403,
                    'error' => "Akses ditolak. Hanya pengguna dengan peran Customer dan UMKM yang dapat melakukan tindakan ini."
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($result, $result['code']);
    }

    public function getRequestMerch(Request $request)
    {
        try {
            $user = User::where('id', Auth::user()->id)->with('customer', 'customerUmkm')->first();

            if ($user->role === 'Customer' || $user->role === 'UMKM') {
                $point = $user->role === 'Customer' ? $user->customer->point : $user->customerUmkm->point;

                $transactions = $this->pointTransactionService->getAllPointTransactionWithSearch($request);

                $result = [
                    'success' => true,
                    'code' => 200,
                    'result' => [
                        'point' => $point,
                        'transactions' => $transactions->toArray(),
                    ],
                ];
            } else {
                $result = [
                    'success' => false,
                    'code' => 403,
                    'error' => "Akses ditolak. Hanya pengguna dengan peran Customer dan UMKM yang dapat melakukan tindakan ini."
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['code']);
    }
}
