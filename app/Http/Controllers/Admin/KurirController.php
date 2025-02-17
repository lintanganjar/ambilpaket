<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Courier\CourierService;
use Exception;

class KurirController extends Controller
{
    protected $courierService;

    public function __construct(CourierService $courierService)
    {
        $this->courierService = $courierService;
    }

    public function getCouriersInAdminHubArea(Request $request)
    {
        $adminHubArea = [
            'province_id' => $request->input('province_id'),  
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
        ];

        try {
            $couriers = $this->courierService->getCouriersInSameArea($adminHubArea);

            return response()->json([
                'status' => 'success',
                'data' => $couriers,
            ]);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to retrieve couriers in the same area.',
            ], 500);
        }
    }

    /**
     * Menambahkan data kurir baru.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeCourier(Request $request)
    {
        // Validasi data dari request (Anda bisa menambahkan validasi di sini jika diperlukan)
        $validatedData = $request->validate([
            'user_id' => 'required|unique:couriers,user_id',
            'courier_type' => 'required|in:Delivery,Pickup',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'gender' => 'required|in:Pria,Wanita',
            'profile_img' => 'nullable|string|max:255',
            'area_id' => 'required|exists:areas,id',
            'balance' => 'required|numeric',
            'bank_name' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ]);

        try {
            // Memanggil service untuk menyimpan data kurir
            $courier = $this->courierService->storeCourierData($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Kurir berhasil ditambahkan.',
                'data' => $courier
            ], 201); // Status 201 untuk created
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }   

    public function index(Request $request){
        $couriers = $this->courierService->getAllCouriersWithSearch($request);
        return view('pages.admin-hub.data-master.data-kurir.index', compact('couriers'));
    }
}
