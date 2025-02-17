<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use App\Services\User\UserService;
use App\Http\Controllers\Controller;
use App\Services\AgenSubmission\AgenSubmissionService;
use App\Services\District\DistrictService;
use App\Services\Partnerships\PartnershipsService;
use App\Services\Province\ProvinceService;
use App\Services\Regency\RegencyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AgenController extends Controller
{
    protected $agenService;
    protected $agenSubmissionService;
    protected $userService;
    protected $partnershipsService;
    protected $regencyService;
    protected $provinceService;
    protected $districtService;

    public function __construct(AgenService $agenService,
                                AgenSubmissionService $agenSubmissionService,
                                UserService $userService, 
                                PartnershipsService $partnershipsService,
                                RegencyService $regencyService,
                                ProvinceService $provinceService,
                                DistrictService $districtService)
    {
        $this->agenService = $agenService;
        $this->agenSubmissionService = $agenSubmissionService;
        $this->userService = $userService;
        $this->partnershipsService = $partnershipsService;
        $this->regencyService = $regencyService;
        $this->provinceService = $provinceService;
        $this->districtService = $districtService;
    }

    public function getAgenByArea(Request $request)
    {
        try {
            $agens = $this->agenService->getAllAgenWithSearch($request);
            return response()->json([
                'status' => 'success',
                'data' => $agens,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getPendaftaranAgen(Request $request)
    {
        try {
            $pendaftaran = $this->agenService->getAgenDetailByRegencyId($request->regency_id)->paginate(10);
            return response()->json([
                'status' => 'success',
                'data' => $pendaftaran->items(),
                'pagination' => [
                    'total' => $pendaftaran->total(),
                    'per_page' => $pendaftaran->perPage(),
                    'current_page' => $pendaftaran->currentPage(),
                    'last_page' => $pendaftaran->lastPage(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function approveAgen($id)
    {
        try {
            $agen = $this->agenService->getAgenDetail($id);

            $dataUser = [
                'first_name' => $agen->first_name,
                'last_name' => $agen->last_name,
                'email' => $agen->email,
                'password' => bcrypt(Str::random(12)),
            ];

            $role = 'agen';
            $this->userService->createUserWithRole($dataUser, $role);
            $this->agenService->updateAgenData($id, ['status' => 'diterima']);

            return response()->json([
                'status' => 'success',
                'message' => 'Agen disetujui dan akun telah dibuat.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function rejectAgen($id)
    {
        try {
            $this->agenService->updateAgenData($id, ['status' => 'ditolak']);
            return response()->json([
                'status' => 'success',
                'message' => 'Pendaftaran agen ditolak.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function storeAgen(Request $request)
    {
        $validatedData = $request->validate([
            'submission_id' => 'required|integer|exists:agen_submissions,id',
            'user_id' => 'required|integer|exists:users,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:15',
            'province_id' => 'nullable|integer|exists:provinces,id',
            'regency_id' => 'nullable|integer|exists:regencies,id',
            'district_id' => 'nullable|integer|exists:districts,id',
            'full_address' => 'required|string',
            'bank_name' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string|max:20',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('profile_img')) {
            $imagePath = $request->file('profile_img')->store('public/profiles');
            $validatedData['profile_img'] = basename($imagePath);
        }

        try {
            $result = $this->agenService->storeAgenData($validatedData);
            return response()->json([
                'status' => 'success',
                'message' => 'Agen berhasil ditambahkan.',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function data_agen(Request $request){
        $data_agen = $this->agenService->getAllAgenWithSearch($request);
        $partnerships = $this->partnershipsService->getAllPartnerships();
        return view('pages.admin-hub.agen.data-agen.index', compact('data_agen', 'partnerships'));
    }

     public function agen_registration(Request $request)
    {
        $pendaftaran = $this->agenSubmissionService->getAllAgenSubmissionWithSearch($request);
        return view('pages.admin-hub.agen.pendaftaran-agen.index', compact('pendaftaran'));
    }
    
}
