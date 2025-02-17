<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function getCustomersInAdminHubArea(Request $request)
    {
        // Menentukan area Admin-HUB (misalnya berdasarkan parameter yang diterima)
        $adminHubArea = [
            'province_id' => $request->input('province_id'),  // Dapatkan dari input atau hardcode
            'regency_id' => $request->input('regency_id'),
            'district_id' => $request->input('district_id'),
        ];

        try {
            // Panggil service untuk mendapatkan customer berdasarkan area
            $customers = $this->customerService->getCustomersInSameArea($adminHubArea);

            // Tampilkan hasil
            return response()->json([
                'status' => 'success',
                'data' => $customers,
            ]);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => 'error',
                'message' => 'Unable to retrieve customers in the same area.',
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $customers =  $this->customerService->getAllCustomerWithSearch($request);
        // dd($customers);
        return view('pages.admin-hub.data-master.data-customer.index', compact('customers'));
    }
}
