<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Otp\OtpService;
use App\Services\Umkm\UmkmService;
use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use App\Services\Customer\CustomerService;
use Illuminate\Support\Facades\Log;

class AuthController extends \App\Http\Controllers\Controller
{
    // User Services | Customer Services | Umkm Services | Otp Services
    private $userService, $customerService, $umkmService, $otpService;

    public function __construct(
        UserService $userService,
        CustomerService $customerService,
        UmkmService $umkmService,
        OtpService $otpService,
    ) {
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->umkmService = $umkmService;
        $this->otpService = $otpService;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::user()->id);

            if ($user->is_banned) {
                Auth::logout();
                return response()->json([
                    "success" => false,
                    "code" => 500,
                    "error" => 'Akun Anda telah diblokir. Silakan hubungi administrator.',
                ], 500);
            }

            $token = $user->createToken('api_token')->plainTextToken;

            switch ($user->role) {
                case 'Admin':
                    return redirect()->intended('/admin-hub/dashboard')->with([
                        "success" => true,
                        "code" => 200,
                        "token" => $token,
                        "data" => [$user, $user['admin']]
                    ]);
                    break;
                case 'Customer':
                    return response()->json([
                        "success" => true,
                        "code" => 200,
                        "token" => $token,
                        "data" => [$user, $user['customer']],
                    ]);
                    break;
                case 'UMKM':
                    return response()->json([
                        "success" => true,
                        "code" => 200,
                        "token" => $token,
                        "data" => [$user, $user['customerUmkm']],
                    ]);
                    break;
                case 'Courier':
                    return response()->json([
                        "success" => true,
                        "code" => 200,
                        "token" => $token,
                        "data" => [$user, $user['couriers']],
                    ]);
                    break;
                default:
                    return response()->json([
                        'success' => false,
                        'code' => 400,
                        'pesan' => "Role pengguna tidak valid.",
                    ], 400);
            }
        } else {
            return response()->json([
                "success" => false,
                "code" => 500,
                "error" => 'Email atau Password yang anda berikan salah.',
            ], 500);
        }
    }

    public function register(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = strtolower($request->role);

        if ($role == 'customer') {
            try {
                $result = [
                    'success' => true,
                    'code' => 200,
                ];

                $result['dataUser'] = $this->userService->createUserWithRole($dataUser, $role);
                $dataCustomer = $request->only([
                    'first_name',
                    'last_name',
                    'phone_number',
                ]);
                $dataCustomer['user_id'] = $result['dataUser']->id;

                try {
                    $result['dataCustomer'] = $this->customerService->storeCustomerData($dataCustomer);
                } catch (Exception $e) {
                    $this->userService->deleteUserData($result['dataUser']->id);
                    $result = [
                        'success' => false,
                        'code' => 500,
                        'error' => $e->getMessage() . ', Kesalahan dalam Pembuatan Pelanggan.',
                        'check' => $dataCustomer,
                    ];
                }
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'code' => 500,
                    'error' => $e->getMessage() . ', Kesalahan dalam Pembuatan Pengguna.'
                ];
            }
        }

        if ($role == 'umkm') {
            try {
                $result = [
                    'success' => true,
                    'code' => 200,
                ];

                $result['dataUser'] = $this->userService->createUserWithRole($dataUser, $role);

                $dataUmkm = $request->only([
                    'first_name',
                    'last_name',
                    'phone_number'
                ]);
                $dataUmkm['user_id'] = $result['dataUser']->id;

                try {
                    $result['dataUmkm'] = $this->umkmService->storeUmkmData($dataUmkm);
                } catch (Exception $e) {
                    $this->userService->deleteUserData($result['dataUser']->id);
                    $result = [
                        'success' => false,
                        'code' => 500,
                        'error' => $e->getMessage() . ', Kesalahan dalam Pembuatan UMKM.',
                        'check' => $dataUmkm,
                    ];
                }
            } catch (Exception $e) {
                $result = [
                    'success' => false,
                    'code' => 500,
                    'error' => $e->getMessage() . ', Kesalahan dalam Pembuatan Pengguna.'
                ];
            }
        }

        return response()->json($result, $result['code']);
    }

    public function sendOtp(Request $request)
    {
        $email = $request->only(['email']);

        try {
            $result = $this->otpService->sendOtp($email);

            if (in_array($result['code'], [400, 404, 429])) {
                $result = [
                    'success' => false,
                    'code' => $result['code'],
                    'error' => $result['error'],
                ];
            } else if ($result['code'] == 200) {
                $user = User::where('email', $request->email)->first();
                $token = $user->createToken('auth_token')->plainTextToken;

                $result = [
                    'success' => true,
                    'code' => 200,
                    'message' => $result['message'],
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'otp' => $result['otp'],
                    'expires_at' => $result['expires_at'],
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam Mengirim OTP.'
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function sendOtpNewEmail(Request $request)
    {
        $email = $request->only(['email']);

        try {
            $result = $this->otpService->sendOtpNewEmail($email);

            if (in_array($result['code'], [400, 404, 429, 500])) {
                $result = [
                    'success' => false,
                    'code' => $result['code'],
                    'error' => $result['error'],
                ];
            } else if ($result['code'] == 200) {
                $result = [
                    'success' => true,
                    'code' => 200,
                    'message' => $result['message'],
                    'otp' => $result['otp'],
                    'expires_at' => $result['expires_at'],
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam Mengirim OTP.'
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function verifyOtp(Request $request)
    {
        try {
            $user = Auth::user();
            $result = $this->otpService->verifyOtp($user->email, $request->otp);

            if ($result['code'] == 400) {
                $result = [
                    'success' => false,
                    'code' => $result['code'],
                    'error' => $result['error'],
                ];
            } else if ($result['code'] == 200) {
                $user = User::find($user->id);
                $token = $user->createToken('auth_token')->plainTextToken;

                $result = [
                    'success' => true,
                    'code' => $result['code'],
                    'message' => $result['message'],
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam Verifikasi OTP.'
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function verifyOtpNewEmail(Request $request)
    {
        try {
            $result = $this->otpService->verifyOtp($request->email, $request->otp);

            if ($result['code'] == 400) {
                $result = [
                    'success' => false,
                    'code' => $result['code'],
                    'error' => $result['error'],
                ];
            } else if ($result['code'] == 200) {
                $result = [
                    'success' => true,
                    'code' => $result['code'],
                    'message' => $result['message'],
                ];
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam Verifikasi OTP.'
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function resetPassword(Request $request)
    {
        $dataPasswordUser = $request->only([
            'password',
            'password_confirmation'
        ]);

        try {
            $user = Auth::user();
            $result = $this->otpService->resetPassword($user, $dataPasswordUser);

            $result = [
                'success' => true,
                'code' => $result['code'],
                'data' => $result['data'],
            ];
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'code' => 500,
                'error' => $e->getMessage() . ', Kesalahan dalam Pembaruan Pengguna.'
            ];
        }

        return response()->json($result, $result['code']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->user('sanctum')->currentAccessToken()->delete();

        return response()->json([
            "success" => true,
            "code" => 200,
            "data" => 'berhasil. ' . 'Anda telah keluar.'
        ]);
    }
}
