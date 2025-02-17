<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\Customer\CustomerService;
use Illuminate\Http\Request;
use Exception;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected $customerService, $userService;

    public function __construct(CustomerService $customerService, UserService $userService)
    
    {
        $this->customerService = $customerService;
        $this->userService = $userService; 
    }

    public function index(Request $request)
    {
        try {
            $result = $this->customerService->getAllCustomerWithSearch($request);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'data' => $result
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function createCustomer(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);

        $dataCustomer = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'full_address',
            'profile_img',
            'area_id',
        ]);

        $validator = Validator::make($dataCustomer, [
            'first_name' => 'bail|required|string|max:255',
            'last_name' => 'bail|required|string|max:255',
            'phone_number' => 'required|numeric', 
            'full_address' => 'nullable|string|max:255',
            'profile_img' => 'nullable|string|max:255',
            'area_id' => 'required|exists:areas,id', 
        ], [
            'first_name.required' => 'Nama depan wajib diisi.',
            'first_name.string' => 'Nama depan harus berupa teks.',
            'first_name.max' => 'Nama depan maksimal 255 karakter.',
            'last_name.required' => 'Nama belakang wajib diisi.',
            'last_name.string' => 'Nama belakang harus berupa teks.',
            'last_name.max' => 'Nama belakang maksimal 255 karakter.',
            'phone_number.required' => 'Nomor telepon wajib diisi.',
            'phone_number.numeric' => 'Nomor telepon harus berupa angka.',
            'full_address.string' => 'Alamat lengkap harus berupa teks.',
            'full_address.max' => 'Alamat lengkap maksimal 255 karakter.',
            'profile_img.string' => 'URL profil harus berupa teks.',
            'profile_img.max' => 'URL profil maksimal 255 karakter.',
            'area_id.required' => 'Area wajib diisi.',
            'area_id.exists' => 'Area yang dipilih tidak valid.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Success' => false,
                'Code' => 422,
                'Errors' => $validator->errors(),
            ], 422);
        }

        try {
            $role = 'customer';
            $user = $this->userService->createUserWithRole($dataUser, $role);

            $dataCustomer['user_id'] = $user->id;

            $result = $this->customerService->storeCustomerData($dataCustomer);

            return response()->json([
                'Success' => true,
                'Code' => 201,
                'data' => $result
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }
}
