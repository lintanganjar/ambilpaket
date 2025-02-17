<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use App\Models\Parcels;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Services\Parcels\ParcelsService;

class ParcelsController extends \App\Http\Controllers\Controller
{
    private $userService, $parcelService;
    public function __construct(
        UserService $userService,
        ParcelsService $parcelService,
    ) {
        $this->userService = $userService;
        $this->parcelService = $parcelService;
    }

    public function getAllParcels(Request $request)
    {
        try {
            $result = $this->parcelService->getAllWithSearch($request);

            if ($request->search || $request->resi_number || $request->start_date || $request->end_date) {
                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        "search" => $result,
                        'today' => [],
                        'week' => [],
                        'past' => [],
                    ],
                ], 200);
            } else {
                $today = Carbon::today();
                $yesterday = Carbon::yesterday()->endOfDay();
                $sevenDaysAgo = $today->copy()->subDays(7);

                $todayData = $result->filter(function ($item) use ($today) {
                    return Carbon::parse($item->created_at)->isSameDay($today);
                });

                $weekData = $result->filter(function ($item) use ($sevenDaysAgo, $yesterday) {
                    $createdAt = Carbon::parse($item->created_at);
                    return $createdAt->between($sevenDaysAgo, $yesterday);
                });

                $pastData = $result->filter(function ($item) use ($sevenDaysAgo) {
                    return Carbon::parse($item->created_at)->lt($sevenDaysAgo);
                });

                return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Data berhasil ditemukan',
                    'data' => [
                        'search' => [],
                        'today' => $todayData->values(),
                        'week' => $weekData->values(),
                        'past' => $pastData->values(),
                    ],
                ], 200);
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam penggunaan parcels.'
            ];
        }

        return response()->json($result);
    }
    public function getResiParcels(Request $request)
    {
        $resi = $request->query('resi_number');
        try {
            $result = $this->parcelService->getByResi($resi);
            $result = [
                'success' => true,
                "code" => 200,
                "message" => "Data berhasil ditemukan",
                'data' => $result
            ];
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam penggunaan parcels.'
            ];
        }

        return response()->json($result);
    }
}
