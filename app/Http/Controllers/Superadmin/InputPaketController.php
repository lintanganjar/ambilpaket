<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Parcels\ParcelsService;

class InputPaketController extends Controller
{
    protected $parcelsService;

    public function __construct(ParcelsService $parcelsService)
    {
        $this->parcelsService = $parcelsService;
    }
    public function create()
    {
        // return view('parcels.create');

        return response()->json([
            'message' => 'Form pengiriman baru tersedia.',
            'fields' => [
                'agen_id',
                'customer_id',
                'price',
                'weight',
                'item_type',
                'item_name',
                'amount',
                'service_price_id',
                'estimation_date',
                'note',
                'proof_img',
                'status'
            ]
        ], 200);
    }

    /**
     * Menyimpan data pengiriman baru.
     */
    public function store(Request $request)
    {
        try {
            // Validasi dan penyimpanan data menggunakan service
            $data = $request->all();
            $parcel = $this->parcelsService->insertParcel($data);

            // Mengembalikan respons sukses
            return response()->json([
                'message' => 'Pengiriman baru berhasil ditambahkan.',
                'data' => $parcel
            ], 201);
        } catch (\Exception $e) {
            // Mengembalikan respons error
            return response()->json([
                'message' => 'Gagal menambahkan pengiriman baru.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
