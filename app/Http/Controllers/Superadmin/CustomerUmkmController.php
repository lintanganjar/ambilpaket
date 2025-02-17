<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Services\Umkm\UmkmService;
use App\Services\User\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerUmkmController extends Controller
{
    protected $umkmService, $userService;

    public function __construct(UmkmService $umkmService, UserService $userService)
    
    {
        $this->umkmService = $umkmService;
        $this->userService = $userService; 
    }

    public function index(Request $request)
    {
        try {
            $result = $this->umkmService->getAllUmkmWithSearch($request);
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


    public function createCustomerUmkm(Request $request)
{
    $dataUser = $request->only([
        'first_name',
        'last_name',
        'email',
        'password',  
    ]);

    $dataUmkm = $request->only([
        'first_name',
        'last_name',
        'phone_number',
        'full_address',
        'profile_img',
        'area_id',
        'business_name',
        'business_type',
        'tax_id',
    ]);

    $validator = Validator::make($dataUmkm, [
        'first_name' => 'bail|required|string|max:255',
        'last_name' => 'bail|required|string|max:255',
        'phone_number' => 'required|numeric',
        'full_address' => 'nullable|string|max:255',
        'profile_img' => 'nullable|string|max:255',
        'area_id' => 'required|exists:areas,id',
        'business_name' => 'required|string|max:255',
        'business_type' => 'required|string|max:255',
        'tax_id' => 'required|string|max:255',
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
        'business_name.required' => 'Nama bisnis wajib diisi.',
        'business_name.string' => 'Nama bisnis harus berupa teks.',
        'business_name.max' => 'Nama bisnis maksimal 255 karakter.',
        'business_type.required' => 'Tipe bisnis wajib diisi.',
        'business_type.string' => 'Tipe bisnis harus berupa teks.',
        'business_type.max' => 'Tipe bisnis maksimal 255 karakter.',
        'tax_id.required' => 'Nomor NPWP wajib diisi.',
        'tax_id.string' => 'Nomor NPWP harus berupa teks.',
        'tax_id.max' => 'Nomor NPWP maksimal 255 karakter.',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'Success' => false,
            'Code' => 422,
            'Errors' => $validator->errors(),
        ], 422);
    }

    try {
        $role = 'UMKM';
        $user = $this->userService->createUserWithRole($dataUser, $role);

        $dataUmkm['user_id'] = $user->id;

        $result = $this->umkmService->storeUmkmData($dataUmkm);

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
