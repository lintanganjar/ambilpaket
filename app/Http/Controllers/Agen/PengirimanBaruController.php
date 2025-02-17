<?php

namespace App\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Parcels\ParcelsService;
use Illuminate\Support\Facades\Auth;
use Exception;

class PengirimanBaruController extends Controller
{
    private $parcelsService;

    public function __construct(ParcelsService $parcelsService)
    {
        $this->parcelsService = $parcelsService;
    }

    public function index(Request $request)
    {
        try {
            $request->merge(['agen_id' => Auth::user()->agen->id]);

            $data = $this->parcelsService->getAllWithSearch($request);
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

    public function show($resi)
    {
        try {
            $parcel = $this->parcelsService->getByResi($resi);

            if (!$parcel) {
                return response()->json([
                    'Success' => false,
                    'Code' => 404,
                    'Message' => 'Parcel not found',
                ], 404);
            }
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $parcel,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'customer_id',
            'customer_umkm_id',
            'price',
            'agen_commission',
            'item_type',
            'item_name',
            'amount',
            'weight',
            'item_height',
            'item_width',
            'item_lenght',
            'note',
            'service_price_id',
            'estimation_date',
            'proof_img',
            'status'
        ]);

        $data['agen_id'] = Auth::user()->agen->id;

        try {
            $parcel = $this->parcelsService->insertParcel($data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $parcel,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->only([
                'customer_id',
                'customer_umkm_id',
                'price',
                'agen_commission',
                'item_type',
                'item_name',
                'amount',
                'weight',
                'item_height',
                'item_width',
                'item_lenght',
                'note',
                'service_price_id',
                'estimation_date',
                'proof_img',
                'status'
            ]);
    
            // Filter empty values
            $data = array_filter($data, function($value) {
                return !is_null($value);
            });
    
            if (empty($data)) {
                return response()->json([
                    'Success' => false,
                    'Code' => 404,
                    'Message' => 'No data provided for update'
                ], 404);
            }
    
            $this->parcelsService->updateParcel($id, $data);
            $updatedParcel = $this->parcelsService->getByResi($id);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $updatedParcel
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->parcelsService->deleteParcel($id);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Parcel deleted successfully',
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
