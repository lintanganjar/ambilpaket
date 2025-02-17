<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Hubs\HubsService;
use App\Services\Umkm\UmkmService;
use App\Services\User\UserService;
use App\Services\Admin\AdminService;
use App\Services\Agen\AgenService;
use App\Services\AgenSubmission\AgenSubmissionService;
use Illuminate\Support\Facades\Auth;
use App\Services\Finance\FinanceService;
use App\Services\Customer\CustomerService;
use App\Services\Ongkir\OngkirService;

class TestingController extends Controller
{
    // Hub Services | User Services |Admin Services
    private $hubsService, $userService, $adminService;
    // Customer Services | Finance Service | Umkm Service
    private $customerService, $financeService, $umkmService;
    // Agen Services | Agen Submission Services | Ongkir Services
    private $agenService, $agenSubmissionService, $ongkirService;

    public function __construct(
        HubsService $hubsService,
        UserService $userService,
        AdminService $adminService,
        CustomerService $customerService,
        FinanceService $financeService,
        UmkmService $umkmService,
        AgenService $agenService,
        AgenSubmissionService $agenSubmissionService,
        OngkirService $ongkirService,
    ) {
        $this->hubsService = $hubsService;
        $this->userService = $userService;
        $this->adminService = $adminService;
        $this->customerService = $customerService;
        $this->financeService = $financeService;
        $this->umkmService = $umkmService;
        $this->agenService = $agenService;
        $this->agenSubmissionService = $agenSubmissionService;
        $this->ongkirService = $ongkirService;
    }

    // <================================ API CEK ONGKIR ================================>
    public function cekOngkir(Request $request){
        $data = $request->only([
            'origin',
            'destination',
            'weight',
        ]);
        $result = [
            'Success' => true,
            'Code' => 200,
        ]; 
        try {
            $result['price']= $this->ongkirService->cekOngkir($data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 400,
                'Error' => $e->getMessage(),
            ];
        }
        return response()->json([
            'Result' => $result,
            'Data' => $data,
        ]);
    }

    // <================================ API CEK ONGKIR ================================>

    // <-------------------------------- Start of USER Modul -------------------------------->
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::user()->id);

            if ($user->is_banned) {
                Auth::logout();
                return redirect()->back()->with([
                    'error' => 'Akun Anda telah diblokir. Silakan hubungi administrator.'
                ]);
            }

            $token = $user->createToken('api_token')->plainTextToken;
            
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $user,
                'Token' => $token,
            ];
            switch ($user->role) {
                case 'Admin':
                    $result['Data'] = $user['Admin'];
                    break;
                case 'Superadmin':
                    $result['Data'] = $user['superadmin'];
                    break;
                case 'Couriers':
                    $result['Data'] = $user['couriers'];
                    break;
                case 'Agen':
                    $result['Data'] = $user['agen'];
                    break;
                case 'Customer':
                    $result['Data'] = $user['customer'];
                    break;
                case 'UMKM':
                    $result['Data'] = $user['customerUmkm'];
                    break;
                case 'Finance':
                    $result['Data'] = $user['finance'];
                    break;
                default:
                    return response()->json($result);
                    break;
            }
            return response()->json($result);
        } else {
            return redirect()->back()->with([
                'error' => 'Email atau Password yang anda berikan salah.',
            ]);
        }
    }





    // kita coba dulu

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     $remember = $request->has('remember');
    
    //     if (Auth::attempt($credentials, $remember)) {
    //         $user = Auth::user();
    
    //         if ($user->is_banned) {
    //             Auth::logout();
    //             return redirect()->back()->with([
    //                 'error' => 'Akun Anda telah diblokir. Silakan hubungi administrator.'
    //             ]);
    //         }
    
    //         switch ($user->role) {
    //             case 'Admin':
    //                 return redirect()->route('admin-hub.dashboard.index');
    //             case 'Superadmin':
    //                 return redirect()->route('superadmin.dashboard'); // Sesuaikan dengan route superadmin
    //             case 'Couriers':
    //                 return redirect()->route('couriers.dashboard'); // Sesuaikan dengan route couriers
    //             case 'Agen':
    //                 return redirect()->route('agen.dashboard'); // Sesuaikan dengan route agen
    //             case 'Customer':
    //                 return redirect()->route('customer.dashboard'); // Sesuaikan dengan route customer
    //             case 'UMKM':
    //                 return redirect()->route('umkm.dashboard'); // Sesuaikan dengan route UMKM
    //             case 'Finance':
    //                 return redirect()->route('finance.dashboard'); // Sesuaikan dengan route finance
    //             default:
    //                 return redirect()->route('dashboard'); // Jika role tidak dikenali, redirect ke dashboard umum
    //         }
    //     } else {
    //         return redirect()->back()->with([
    //             'error' => 'Email atau Password yang anda berikan salah.',
    //         ]);
    //     }
    // }
    


    public function register(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'customer';

        try {
            $dataUser['data'] = $this->userService->createUserWithRole($dataUser, $role);
            $dataCustomer = $request->only([
                'first_name',
                'last_name',
                'phone_number',
                'full_address',
                'profile_img',
            ]);
            $dataCustomer['user_id'] = $dataUser['data']->id;

            $result = [
                'Success' => true,
                'Code' => 200,
            ];
            try {
                $result['data'] = $this->customerService->storeCustomerData($dataCustomer);
                $user = User::find($dataUser['data']->id);
                $token = $user->createToken('api_token')->plainTextToken;
                Auth::login($user);
            } catch (Exception $e) {
                $this->userService->deleteUserData($dataUser['data']->id);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataCustomer,
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json([
            'Data' => $result,
            'Token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->user('sanctum')->currentAccessToken()->delete();

        // Redirect to login page or any other page
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => 'You have been logged out.'
        ]);
    }

    public function banUser(Request $request, $id)
    {
        $reason = $request->only(['ban_reason']);
        $result = $this->userService->banUser($id, $reason);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result,
        ]);
    }

    public function unBanUser($id)
    {
        $result = $this->userService->unBanUser($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result,
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        $data = $request->only([
            'username',
            'email',
            'password',
            'role',
            'banned',
            'ban_reason'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->userService->updateUserData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    public function deleteUser($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['is_Delete'] = $this->userService->deleteUserData($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of USER Modul -------------------------------->

    // <-------------------------------- Start of HUB Modul -------------------------------->
    // Show Hubs With Filter
    public function showHubs(Request $request)
    {
        $result = $this->hubsService->getAllHubWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Show Hub Detail
    public function getHubDetail($id)
    {
        $result = $this->hubsService->getHubDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Insert New Hub
    public function createHub(Request $request)
    {
        $data = $request->only([
            'area_id',
            'name',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->hubsService->storeHubData($data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // Update Hub Data
    public function updateHub(Request $request, $id)
    {
        $data = $request->only([
            'area_id',
            'name',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->hubsService->updateHubData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // Delete Hub Data
    public function deleteHub($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['is_Delete'] = $this->hubsService->deleteHubData($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of HUB Modul -------------------------------->

    // <-------------------------------- Start of ADMIN Modul -------------------------------->
    // Show Admin With Filter
    public function showAdmins(Request $request)
    {
        $result = $this->adminService->getAllAdminWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Show Admin Detail
    public function getAdminDetail($id)
    {
        $result = $this->adminService->getAdminDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Insert New Admin
    public function createAdmin(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'admin';

        try {
            $userdata = $this->userService->createUserWithRole($dataUser, $role);
            $dataAdmin = $request->only([
                'hub_id',
                'first_name',
                'last_name',
                'phone_number',
                'full_address',
                'profile_img',
            ]);
            $dataAdmin['user_id'] = $userdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];
            try {
                $result['data'] = $this->adminService->storeAdminData($dataAdmin);
            } catch (Exception $e) {
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataAdmin
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // Update Admin Data
    public function updateAdmin(Request $request, $id)
    {

        $data = $request->only([
            'hub_id',
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'profile_img',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->adminService->updateAdminData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of ADMIN Modul -------------------------------->

    // <-------------------------------- Start of Customer Modul -------------------------------->
    // Show Customer With Filter
    public function showCustomers(Request $request)
    {
        $result = $this->customerService->getAllCustomerWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Show Customer Detail
    public function getCustomerDetail($id)
    {
        $result = $this->customerService->getCustomerDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    // Insert New Customer
    public function createCustomer(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'customer';

        try {
            $userdata = $this->userService->createUserWithRole($dataUser, $role);
            $dataCustomer = $request->only([
                'first_name',
                'last_name',
                'phone_number',
                'full_address',
                'profile_img',
            ]);
            $dataCustomer['user_id'] = $userdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];
            try {
                $result['data'] = $this->customerService->storeCustomerData($dataCustomer);
            } catch (Exception $e) {
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataCustomer,
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // Update Customer Data
    public function updateCustomer(Request $request, $id)
    {

        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'postal_code',
            'full_address',
            'point',
            'profile_img',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->customerService->updateCustomerData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of Customer Modul -------------------------------->

    // <-------------------------------- Start of FINANCE Modul -------------------------------->
    // Show Finance With Filter
    public function showFinances(Request $request)
    {
        $result = $this->financeService->getAllFinanceWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Show Finance Detail
    public function getFinanceDetail($id)
    {
        $result = $this->financeService->getFinanceDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Insert New Finance
    public function createFinance(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'finance';

        try {
            $userdata = $this->userService->createUserWithRole($dataUser, $role);
            $dataFinance = $request->only([
                'first_name',
                'last_name',
                'phone_number',
                'province_id',
                'regency_id',
                'district_id',
                'full_address',
                'profile_img',
            ]);
            $dataFinance['user_id'] = $userdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];
            try {
                $result['data'] = $this->financeService->storeFinanceData($dataFinance);
            } catch (Exception $e) {
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataFinance
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Update Finance Data
    public function updateFinance(Request $request, $id)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'profile_img',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['Data'] = $this->financeService->updateFinanceData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of FINANCE Modul -------------------------------->

    // <-------------------------------- Start of UMKM Modul -------------------------------->
    // Show UMKM With Filter
    public function showUmkms(Request $request)
    {
        $result = $this->umkmService->getAllUmkmWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Show UMKM Detail
    public function getUmkmDetail($id)
    {
        $result = $this->umkmService->getUmkmDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Insert New UMKM
    public function createUmkm(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'umkm';

        try {
            $userdata = $this->userService->createUserWithRole($dataUser, $role);

            $dataUmkm = $request->only([
                'first_name',
                'last_name',
                'phone_number',
                'company_name',
                'product_type',
                'province_id',
                'regency_id',
                'district_id',
                'full_address',
                'latitude',
                'longitude',
                'parcel_average_per_day',
                'pickup_activation',
                'days_of_pickup',
                'time_of_pickup',
            ]);
            $dataUmkm['user_id'] = $userdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];

            try {
                $result['data'] = $this->umkmService->storeUmkmData($dataUmkm);
            } catch (Exception $e) {
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataUmkm,
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Update UMKM Data
    public function updateUmkm(Request $request, $id)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'phone_number',
            'company_name',
            'product_type',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude',
            'parcel_average_per_day',
            'pickup_activation',
            'days_of_pickup',
            'time_of_pickup',
        ]);

        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->umkmService->updateUmkmData($id, $data)
            ];
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of UMKM Modul -------------------------------->

    // <-------------------------------- Start of Agen Modul -------------------------------->
    // Show Agen With Filter
    public function showAgens(Request $request)
    {
        $result = $this->agenService->getAllAgenWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Show Agen Detail
    public function getAgenDetail($id)
    {
        $result = $this->agenService->getAgenDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Insert New Agen
    public function createAgen(Request $request)
    {
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'agen';

        try {
            $userdata = $this->userService->createUserWithRole($dataUser, $role);

            $dataAgen = $request->only([
                'partnership_id',
                'submission_id',
                'first_name',
                'last_name',
                'phone_number',
                'province_id',
                'regency_id',
                'district_id',
                'full_address',
                'building_type',
                'building_status',
                'location',
                'latitude',
                'longitude',
                'balance',
                'bank_name',
                'account_name',
                'account_number',
                'profile_img'
            ]);
            $dataAgen['user_id'] = $userdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];

            try {
                $result['data'] = $this->agenService->storeAgenData($dataAgen);
            } catch (Exception $e) {
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                    'Check' => $dataAgen,
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Update Agen Data
    public function updateAgen(Request $request, $id)
    {
        $data = $request->only([
            'partnership_id',
            'first_name',
            'last_name',
            'phone_number',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'building_type',
            'building_status',
            'location',
            'latitude',
            'longitude',
            'balance',
            'bank_name',
            'account_name',
            'account_number',
            'profile_img'
        ]);

        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->agenService->updateAgenData($id, $data)
            ];
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of Agen Modul -------------------------------->

    // <-------------------------------- Start of Agen Submission Modul -------------------------------->  
    // Insert New Agen Submission
    public function createAgenSubmission(Request $request)
    {
        $dataAgenSub = $request->only([
            'agen_first_name',
            'agen_last_name',
            'agen_phone_number',
            'agen_email',
            'agen_password',
            'agen_province_id',
            'agen_regency_id',
            'agen_district_id',
            'agen_full_address',
            'latitude',
            'longitude',
            'building_type',
            'building_status',
            'location',
            'ktp_img',
            'npwp_img',
            'akta_pendiri_perusahaan_img',
            'suket_domisili_usaha_img',
            'surat_izin_usaha_perusahaan_img',
            'location_img',
            'building_condition_img',
            'bank_name',
            'account_name',
            'account_number'
        ]);

        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->agenSubmissionService->storeAgenSubmission($dataAgenSub)
            ];
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Confirm Agen Registration
    public function confirmAgenRegistration($submissionId)
    {
        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->agenSubmissionService->confirmAgenRegistration($submissionId)
            ];
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of Agen Submission Modul -------------------------------->
}

