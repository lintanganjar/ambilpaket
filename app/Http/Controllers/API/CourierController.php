<?php

namespace App\Http\Controllers\API;

use App\Models\District;
use App\Models\Regency;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\Courier\CourierService;
use App\Services\Parcels\ParcelsService;
use App\Services\ParcelAssignment\ParcelAssignmentService;
use App\Services\CourierCommission\CourierCommissionService;
use App\Services\CourierIncome\CourierIncomeService;
use App\Services\District\DistrictService;
use App\Services\Regency\RegencyService;

class CourierController extends \App\Http\Controllers\Controller
{
    private $courierCommissionService, $courierIncomeService, $courierService, $parcelAssignmentService, $parcelService, $districtService, $regencyService;

    public function __construct(
        CourierCommissionService $courierCommissionService,
        CourierIncomeService $courierIncomeService,
        CourierService $courierService,
        ParcelAssignmentService $parcelAssignmentService,
        ParcelsService $parcelService,
        DistrictService $districtService,
        RegencyService $regencyService,
    ) {
        $this->courierCommissionService = $courierCommissionService;
        $this->courierIncomeService = $courierIncomeService;
        $this->courierService = $courierService;
        $this->parcelAssignmentService = $parcelAssignmentService;
        $this->parcelService = $parcelService;
        $this->districtService = $districtService;
        $this->regencyService = $regencyService;
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role == "Courier") {
            $courierCommission = $this->courierCommissionService->getCourierCommission($request);
            $courierIncome = $this->courierIncomeService->getAllCourierIncomeWithSearch($request);

            if ($request->filter_status && $request->start_date && $request->end_date) {
                if ($request->filter_status == "Terima Saldo") {
                    return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Data berhasil ditemukan',
                        'data' => [
                            'balance' => $user->couriers->balance,
                            "search" => $courierIncome->values()->map(function ($item) {
                                $status_saldo = 'Terima Saldo';
                                $amount = $item->income;

                                return [
                                    'id' => $item->id,
                                    'courier_id' => $item->courier_id,
                                    'parcel_id' => $item->parcel_id,
                                    'status_saldo' => $status_saldo,
                                    'status_request' => null,
                                    'amount' => $amount,
                                    'bank_name' => null,
                                    'account_name' => null,
                                    'account_number' => null,
                                    'created_at' => $item->created_at,
                                    'updated_at' => $item->updated_at,
                                ];
                            }),
                            'today' => [],
                            'yesterday' => [],
                            'past' => [],
                        ],
                    ], 200);
                } else {
                    return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Data berhasil ditemukan',
                        'data' => [
                            'balance' => $user->couriers->balance,
                            "search" => $courierCommission->values()->map(function ($item) {
                                $status_saldo = 'Tarik Saldo';
                                $status_request = $item->request_status;
                                $amount = $item->amount;

                                return [
                                    'id' => $item->id,
                                    'courier_id' => $item->courier_id,
                                    'parcel_id' => null,
                                    'status_saldo' => $status_saldo,
                                    'status_request' => $status_request,
                                    'amount' => $amount,
                                    'bank_name' => $item->bank_name,
                                    'account_name' => $item->account_name,
                                    'account_number' => $item->account_number,
                                    'created_at' => $item->created_at,
                                    'updated_at' => $item->updated_at,
                                ];
                            }),
                            'today' => [],
                            'yesterday' => [],
                            'past' => [],
                        ],
                    ], 200);
                }
            } else if ($request->filter_status) {
                $today = Carbon::today();
                $yesterday = Carbon::yesterday();

                if ($request->filter_status == "Terima Saldo") {
                    $mergedData = $courierIncome->values()
                        ->map(function ($item) {
                            $status_saldo = 'Terima Saldo';
                            $amount = $item->income;

                            return [
                                'id' => $item->id,
                                'courier_id' => $item->courier_id,
                                'parcel_id' => $item->parcel_id,
                                'status_saldo' => $status_saldo,
                                'status_request' => null,
                                'amount' => $amount,
                                'bank_name' => null,
                                'account_name' => null,
                                'account_number' => null,
                                'created_at' => $item->created_at,
                                'updated_at' => $item->updated_at,
                            ];
                        });
                } else {
                    $mergedData = $courierCommission->values()
                        ->map(function ($item) {
                            $status_saldo = 'Tarik Saldo';
                            $status_request = $item->request_status;
                            $amount = $item->amount;

                            return [
                                'id' => $item->id,
                                'courier_id' => $item->courier_id,
                                'parcel_id' => null,
                                'status_saldo' => $status_saldo,
                                'status_request' => $status_request,
                                'amount' => $amount,
                                'bank_name' => $item->bank_name,
                                'account_name' => $item->account_name,
                                'account_number' => $item->account_number,
                                'created_at' => $item->created_at,
                                'updated_at' => $item->updated_at,
                            ];
                        });
                }

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        'balance' => $user->couriers->balance,
                        'search' => [],
                        'today' => $mergedData->filter(function ($item) use ($today) {
                            return Carbon::parse($item['created_at'])->isSameDay($today);
                        })->values(),
                        'yesterday' => $mergedData->filter(function ($item) use ($yesterday) {
                            return Carbon::parse($item['created_at'])->isSameDay($yesterday);
                        })->values(),
                        'past' => $mergedData->filter(function ($item) use ($yesterday) {
                            return Carbon::parse($item['created_at'])->lt($yesterday);
                        })->values(),
                    ],
                ], 200);
            } else if ($request->start_date || $request->end_date) {
                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        'balance' => $user->couriers->balance,
                        "search" => $courierCommission->merge($courierIncome)->map(function ($item) {
                            $status_saldo = isset($item->income) ? 'Terima Saldo' : 'Tarik Saldo';
                            $status_request = isset($item->request_status) ? $item->request_status : null;
                            $amount = isset($item->income) ? $item->income : $item->amount;

                            return [
                                'id' => $item->id,
                                'courier_id' => $item->courier_id,
                                'parcel_id' => $item->parcel_id ?? null,
                                'status_saldo' => $status_saldo,
                                'status_request' => $status_request,
                                'amount' => $amount,
                                'bank_name' => $item->bank_name ?? null,
                                'account_name' => $item->account_name ?? null,
                                'account_number' => $item->account_number ?? null,
                                'created_at' => $item->created_at,
                                'updated_at' => $item->updated_at,
                            ];
                        }),
                        'today' => [],
                        'yesterday' => [],
                        'past' => [],
                    ],
                ], 200);
            } else {
                $today = Carbon::today();
                $yesterday = Carbon::yesterday();

                $mergedData = $courierCommission->values()->merge($courierIncome->values())
                    ->map(function ($item) {
                        $status_saldo = isset($item->income) ? 'Terima Saldo' : 'Tarik Saldo';
                        $status_request = isset($item->request_status) ? $item->request_status : null;
                        $amount = isset($item->income) ? $item->income : $item->amount;

                        return [
                            'id' => $item->id,
                            'courier_id' => $item->courier_id,
                            'parcel_id' => $item->parcel_id ?? null,
                            'status_saldo' => $status_saldo,
                            'status_request' => $status_request,
                            'amount' => $amount,
                            'bank_name' => $item->bank_name ?? null,
                            'account_name' => $item->account_name ?? null,
                            'account_number' => $item->account_number ?? null,
                            'created_at' => $item->created_at,
                            'updated_at' => $item->updated_at,
                        ];
                    });

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        'balance' => $user->couriers->balance,
                        'search' => [],
                        'today' => $mergedData->filter(function ($item) use ($today) {
                            return Carbon::parse($item['created_at'])->isSameDay($today);
                        })->values(),
                        'yesterday' => $mergedData->filter(function ($item) use ($yesterday) {
                            return Carbon::parse($item['created_at'])->isSameDay($yesterday);
                        })->values(),
                        'past' => $mergedData->filter(function ($item) use ($yesterday) {
                            return Carbon::parse($item['created_at'])->lt($yesterday);
                        })->values(),
                    ],
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Akses ditolak. Hanya pengguna dengan peran Courier yang dapat melakukan tindakan ini.',
            ], 403);
        }
    }

    public function store(Request $request)
    {
        $user = User::with('couriers')->find(Auth::id());

        if (!$user) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'error' => 'Pengguna tidak ditemukan.',
            ], 404);
        }

        if ($user->role !== 'Courier') {
            return response()->json([
                'success' => false,
                'code' => 403,
                'error' => 'Akses ditolak. Hanya pengguna dengan peran Courier yang dapat melakukan tindakan ini.',
            ], 403);
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:0',
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
        ]);

        try {
            $courier = $user->couriers;
            if (!$courier) {
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'error' => 'Kurir tidak ditemukan.',
                ], 404);
            }

            $balance = $courier->balance - $validated['amount'];
            if ($balance < 0) {
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'error' => 'Saldo tidak mencukupi.',
                ], 400);
            }

            $dataCourier = array_merge($validated, ['courier_id' => $courier->id]);

            $result = $this->courierCommissionService->storeCourierWithDrawalData($dataCourier);

            $this->courierService->updateCourier($courier->id, ['balance' => $balance]);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Transaksi berhasil diproses.',
                'data' => [
                    'id' => $result->id,
                    'courier_id' => $result->courier_id,
                    'parcel_id' => null,
                    'status_saldo' => "Tarik Saldo",
                    'status_request' => $result->request_status,
                    'amount' => $result->amount,
                    'bank_name' => $result->bank_name,
                    'account_name' => $result->account_name,
                    'account_number' => $result->account_number,
                    'created_at' => $result->created_at,
                    'updated_at' => $result->updated_at,
                ],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateCourierBankAccount(Request $request)
    {
        $user = Auth::user();

        if ($user->role == "Courier") {
            $dataCourier = $request->only([
                'bank_name',
                'account_name',
                'account_number',
            ]);

            $result = [
                'success' => true,
                'code' => 200,
            ];
            try {
                $result['dataCourier'] = $this->courierService->updateCourier($user['couriers']->id, $dataCourier);
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
                'error' => "Akses ditolak. Hanya pengguna dengan peran Courier yang dapat melakukan tindakan ini."
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function getAllParcelAssignmentWithSearch(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->get('search', null);
        if ($user->role == "Courier") {
            $parcelAssignment = $this->parcelAssignmentService->getAllWithSearch($request);

            if ($request->search || $request->start_date || $request->end_date) {
                $filteredData = $parcelAssignment->filter(function ($item) {
                    return in_array($item->status, ['Berhasil', 'Gagal']);
                });

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        "search" => $filteredData->values(),
                        'today' => [],
                        'yesterday' => [],
                        'past' => [],
                    ],
                ], 200);
            } else {
                $today = Carbon::today();
                $yesterday = Carbon::yesterday();

                $todayData = $parcelAssignment->filter(function ($item) use ($today) {
                    return Carbon::parse($item->updated_at)->isSameDay($today) && in_array($item->status, ['Berhasil', 'Gagal']);
                });

                $yesterdayData = $parcelAssignment->filter(function ($item) use ($yesterday) {
                    return Carbon::parse($item->updated_at)->isSameDay($yesterday) && in_array($item->status, ['Berhasil', 'Gagal']);
                });

                $pastData = $parcelAssignment->filter(function ($item) use ($yesterday) {
                    return Carbon::parse($item->updated_at)->lt($yesterday) && in_array($item->status, ['Berhasil', 'Gagal']);
                });

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        'search' => [],
                        'today' => $todayData->values(),
                        'yesterday' => $yesterdayData->values(),
                        'past' => $pastData->values(),
                    ],
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Akses ditolak. Hanya pengguna dengan peran Courier yang dapat melakukan tindakan ini.',
            ], 403);
        }
    }

    public function getAllParcelAssignment(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->get('search', null);
        if ($user->role == "Courier") {
            $parcelAssignment = $this->parcelAssignmentService->getAllWithSearch($request);

            $today = Carbon::today();
            $tasksData = $parcelAssignment->filter(function ($item) use ($today) {
                return Carbon::parse($item->assignment_date)->gte($today) && $item->status === null;
            });

            $successData = $parcelAssignment->filter(function ($item) use ($today) {
                return Carbon::parse($item->created_at)->isSameDay($today) && $item->status === 'Berhasil';
            });

            $failedData = $parcelAssignment->filter(function ($item) use ($today) {
                return Carbon::parse($item->created_at)->isSameDay($today) && $item->status === 'Gagal';
            });

            $area = $user->couriers->area;
            $regency = Regency::find($area->regency_id);
            $districtIds = json_decode($area->district_coverage);
            $districts = District::whereIn('id', $districtIds)->get();
            $areaAddress = "Kabupaten " . ($regency->name);
            if ($districts->isNotEmpty()) {
                $districtNames = $districts->map(function ($district) {
                    return "Kecamatan " . $district->name;
                })->toArray();
                $areaAddress .= ", " . implode(", ", $districtNames);
            }

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil ditemukan',
                'data' => [
                    'area' => $area->id,
                    'area_address' => $areaAddress,
                    'tasks' => $tasksData->values(),
                    'success' => $successData->values(),
                    'failed' => $failedData->values(),
                ],
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Akses ditolak. Hanya pengguna dengan peran Courier yang dapat melakukan tindakan ini.',
            ], 403);
        }
    }

    public function detailParcelAssignmentByResiNumber($resiNumber)
    {
        $parcelAssignment = $this->parcelAssignmentService->getDetailByResiNumber($resiNumber);

        if (!$parcelAssignment) {
            return response()->json([
                'success' => false,
                'code' => 200,
                'data' => [],
            ], 200);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data berhasil ditemukan',
            'data' => $parcelAssignment,
        ], 200);
    }

    public function updateParcelAssignment($id, Request $request)
    {
        $data = $request->only([
            'status_reason',
        ]);

        try {
            if ($request->hasFile('proof_img')) {
                $parcelAssignmentData = $this->parcelAssignmentService->findByid($id);

                $oldImagePath = $parcelAssignmentData->parcels->proof_img;
                if ($oldImagePath && file_exists(storage_path('app/' . $oldImagePath))) {
                    unlink(storage_path('app/' . $oldImagePath));
                }
                $imageFile = $request->file('proof_img');
                $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                $imagePath = $imageFile->storeAs('img/parcel-proof', $imageName);

                $dataParcel = $request->only([
                    'receiver_origin',
                    'status'
                ]);
                $dataParcel['proof_img'] = $imagePath;

                $parcelService = $this->parcelService->updateParcel($parcelAssignmentData->parcels->id, $dataParcel);

                $parcelAssignment = $this->parcelAssignmentService->updateParcelAssignment($id, $data);

                $parcelAssignmentUpdate = $this->parcelAssignmentService->findByid($id);

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil disimpan',
                    'dataParcel' => $parcelService,
                    'dataParcelAssignment' => $parcelAssignment,
                    'data' => $parcelAssignmentUpdate,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'code' => 500,
                    'message' => 'proof img tidak ada',
                ], 500);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
