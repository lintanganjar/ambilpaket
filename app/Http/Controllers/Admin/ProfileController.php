<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class ProfileController extends Controller
{
    protected $adminService;

    /**
     * Constructor untuk dependency injection
     */
    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    /**
     * Menampilkan profil admin
     */
    public function profile(Request $request)
    {
        try {
            // Mendapatkan detail admin berdasarkan ID user saat ini
            $result = $this->adminService->getAdminDetail(Auth::user()->id);

            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => true,
                    'Code' => 200,
                    'Data' => $result,
                ]);
            }

            // // Logika untuk Web
            // return view('profile-view', ['profile' => $result]);
        } catch (Exception $e) {
            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                ], 500);
            }

            // // Logika untuk Web
            // return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Memperbarui profil admin
     */
    public function update(Request $request)
    {
        // Data input yang akan divalidasi dan diupdate
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
            // Melakukan update data admin
            $result = $this->adminService->updateAdminData(Auth::user()->id, $data);

            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => true,
                    'Code' => 200,
                    'Data' => $result,
                ]);
            }

            // Logika untuk Web
            return redirect()->back()->with('status', 'Profile updated successfully!');
        } catch (InvalidArgumentException $e) {
            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => false,
                    'Code' => 422,
                    'Error' => $e->getMessage(),
                ], 422);
            }

            // Logika untuk Web
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Exception $e) {
            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => false,
                    'Code' => 500,
                    'Error' => 'Unable to Update Data',
                ], 500);
            }

            // Logika untuk Web
            return redirect()->back()->withErrors('Unable to Update Data');
        }
    }
}
