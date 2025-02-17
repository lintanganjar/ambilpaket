<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Parcels\ParcelsService;
use Illuminate\Support\Facades\Auth;
use Exception;

class RiwayatPengirimanController extends Controller
{
    protected $parcelService;

    public function __construct(ParcelsService $parcelService)
    {
        $this->parcelService = $parcelService;
    }

    public function index(Request $request)
    {
        try {
            $request->merge([
                'status' => 'Selesai',
                'agen_id' => Auth::user()->agen->id
            ]);

            $data = $this->parcelService->getAllWithSearch($request);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $data,
            ]);

        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }
}
