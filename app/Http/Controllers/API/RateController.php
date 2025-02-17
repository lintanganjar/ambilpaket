<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Rate\RateService;
use Illuminate\Support\Facades\Auth;

class RateController extends \App\Http\Controllers\Controller
{
    private $rateService;

    public function __construct(
        RateService $rateService,
    ) {
        $this->rateService = $rateService;
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);

        if ($user->role == "Customer" || $user->role == "UMKM") {
            $rate = $this->rateService->getAllRate();

            if ($rate->isEmpty()) {
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
                'data' => $rate,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Role pengguna tidak valid.',
            ], 403);
        }
    }

    public function show($id)
    {
        $rate = $this->rateService->showRatingByParcelId($id);

        if (!$rate) {
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
            'data' => $rate[0],
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->only([
                'parcel_id',
                'kurir_id',
                'expedition_rate',
                'expedition_comment',
                'kurir_rate',
                'kurir_comment',
            ]);

            $rate = $this->rateService->rating($data);

            return response()->json([
                'success' => true,
                'code' => 201,
                'message' => 'Data berhasil disimpan',
                'data' => $rate,
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'expedition_rate',
            'expedition_comment',
            'kurir_rate',
            'kurir_comment',
        ]);

        try {
            $rateUpdate = $this->rateService->updateRating($id, $data);

            $rateData = $this->rateService->showRatingById($id, $data);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil diperbarui',
                "update" => $rateUpdate,
                'data' => $rateData[0],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal memperbarui data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
