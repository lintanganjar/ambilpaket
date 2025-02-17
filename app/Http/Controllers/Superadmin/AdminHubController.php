<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\AdminService;
use App\Services\User\UserService;
use Exception;

class AdminHubController extends Controller
{
    private $adminService;
    private $userService;

    public function __construct(AdminService $adminService, UserService $userService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService; 
    }

    public function index(Request $request)
    {
        try {
            $data = $this->adminService->getAllAdminWithSearch($request);
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

    public function store(Request $request)
    {
        $dataAdmin = $request->only([
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

        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);

        try {
            $role = 'admin';
            $user = $this->userService->createUserWithRole($dataUser, $role);

            $dataAdmin['user_id'] = $user->id;
            $admin = $this->adminService->storeAdminData($dataAdmin);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $admin,
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
        try {
            $admin = $this->adminService->updateAdminData($id, $data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $admin,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $this->adminService->deleteAdminData($id);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Admin data deleted successfully.',
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
