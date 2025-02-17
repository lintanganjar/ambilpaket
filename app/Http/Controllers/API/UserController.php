<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Umkm\UmkmService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Services\Courier\CourierService;
use App\Services\Customer\CustomerService;

class UserController extends \App\Http\Controllers\Controller
{
    // User Services | Customer Services | Umkm Services | Courier Services
    private $userService, $customerService, $umkmService, $courierService;

    public function __construct(
        UserService $userService,
        CustomerService $customerService,
        UmkmService $umkmService,
        CourierService $courierService,
    ) {
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->umkmService = $umkmService;
        $this->courierService = $courierService;
    }

    public function getProfileDetail()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'Customer':
                return response()->json([
                    "success" => true,
                    "code" => 200,
                    "data" => [$user, $user['customer'], $user['customer']['province'], $user['customer']['regency'], $user['customer']['district']],
                ]);
                break;
            case 'UMKM':
                return response()->json([
                    "success" => true,
                    "code" => 200,
                    "data" => [$user, $user['customerUmkm'], $user['customerUmkm']['province'], $user['customerUmkm']['regency'], $user['customerUmkm']['district']],
                ]);
                break;
            case 'Courier':
                return response()->json([
                    "success" => true,
                    "code" => 200,
                    "data" => [$user, $user['couriers'], $user['couriers']['area']],
                ]);
                break;
            default:
                return response()->json([
                    'success' => false,
                    'code' => 400,
                    'pesan' => "Role pengguna tidak valid.",
                ], 400);
        }
    }

    public function updateEmail(Request $request)
    {
        $user = Auth::user();

        $data = $request->only([
            'email',
        ]);

        $result = [
            'success' => true,
            'code' => 200,
        ];
        try {
            $result['data'] = $this->userService->updateUserData($user->id, $data);
            $user = User::where('email', $request->email)->first();
            $result['token'] = $user->createToken('auth_token')->plainTextToken;
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->only([
            'old_password',
            'password',
            'password_confirmation'
        ]);

        $user = Auth::user();

        $result = [
            'success' => true,
            'code' => 200,
        ];
        try {
            $result['data'] = $this->userService->changepassword($user, $data);
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'Customer':
                $dataCustomer = $request->only([
                    'first_name',
                    'last_name',
                    'phone_number',
                    'province_id',
                    'regency_id',
                    'district_id',
                    'postal_code',
                    'full_address',
                ]);

                $result = [
                    'success' => true,
                    'code' => 200,
                ];
                try {
                    if ($request->hasFile('profile_img')) {
                        $oldImagePath = $user['customer']->profile_img;
                        if ($oldImagePath && file_exists(storage_path('app/' . $oldImagePath))) {
                            unlink(storage_path('app/' . $oldImagePath));
                        }
                        $imageFile = $request->file('profile_img');
                        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                        $imagePath = $imageFile->storeAs('img/profile', $imageName);
                        $dataCustomer['profile_img'] = $imagePath;
                    }

                    $result['dataCustomer'] = $this->customerService->updateCustomerData($user['customer']->id, $dataCustomer);

                    $result['data'] = User::with('customer', 'customer.province', 'customer.regency', 'customer.district')->find($user->id);
                } catch (Exception $e) {
                    $result = [
                        'success' => false,
                        'code' => 500,
                        'error' => $e->getMessage()
                    ];
                }

                return response()->json($result, $result['code']);
                break;
            case 'UMKM':
                $dataUmkm = $request->only([
                    'first_name',
                    'last_name',
                    'phone_number',
                ]);

                $result = [
                    'success' => true,
                    'code' => 200,
                ];
                try {
                    if ($request->hasFile('profile_img')) {
                        $oldImagePath = $user['customerUmkm']->profile_img;
                        if ($oldImagePath && file_exists(storage_path('app/' . $oldImagePath))) {
                            unlink(storage_path('app/' . $oldImagePath));
                        }
                        $imageFile = $request->file('profile_img');
                        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                        $imagePath = $imageFile->storeAs('img/profile', $imageName);
                        $dataUmkm['profile_img'] = $imagePath;
                    }

                    $result['dataUmkm'] = $this->umkmService->updateUmkmData($user['customerUmkm']->id, $dataUmkm);

                    $result['data'] = User::with('customerUmkm', 'customerUmkm.province', 'customerUmkm.regency', 'customerUmkm.district')->find($user->id);
                } catch (Exception $e) {
                    $result = [
                        'success' => false,
                        'code' => 500,
                        'error' => $e->getMessage()
                    ];
                }

                return response()->json($result, $result['code']);
                break;
            case 'Courier':
                $dataCourier = $request->only([
                    'first_name',
                    'last_name',
                    'phone_number',
                    'bank_name',
                    'account_name',
                    'account_number',
                    'gender',
                    'courier_type',
                ]);

                $result = [
                    'success' => true,
                    'code' => 200,
                ];
                try {
                    if ($request->hasFile('profile_img')) {
                        $oldImagePath = $user['couriers']->profile_img;
                        if ($oldImagePath && file_exists(storage_path('app/' . $oldImagePath))) {
                            unlink(storage_path('app/' . $oldImagePath));
                        }
                        $imageFile = $request->file('profile_img');
                        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
                        $imagePath = $imageFile->storeAs('img/profile', $imageName);
                        $dataCourier['profile_img'] = $imagePath;
                    }

                    $result['dataCourier'] = $this->courierService->updateCourier($user['couriers']->id, $dataCourier);

                    $result['data'] = User::with('couriers', 'couriers.area')->find($user->id);
                } catch (Exception $e) {
                    $result = [
                        'success' => false,
                        'code' => 500,
                        'error' => $e->getMessage()
                    ];
                }

                return response()->json($result, $result['code']);
                break;
        }
    }
}
