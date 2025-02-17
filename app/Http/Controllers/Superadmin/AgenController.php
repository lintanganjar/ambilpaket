<?php

namespace App\Http\Controllers\Superadmin;

use Exception;
use Illuminate\Http\Request;
use App\Services\Agen\AgenService;
use App\Http\Controllers\Controller;
use App\Models\AgenSubmissions;
use App\Services\User\UserService;

class AgenController extends Controller
{
    protected $agenService, $userService;

    public function __construct(AgenService $agenService, UserService $userService)
    {
        $this->agenService = $agenService;
        $this->userService = $userService;
    }

    // Existing methods for other agent-related operations can remain the same
    public function getAllAgenWithSearch(Request $request)
    {
        try {
            $agents = $this->agenService->getAllAgenWithSearch($request);
            return response()->json(['data' => $agents]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil daftar agen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getAgenDetail($id)
    {
        try {
            $agent = $this->agenService->getAgenDetail($id);
            return response()->json(['data' => $agent]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mengambil detail agen',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menampilkan riwayat top up saldo agen
    public function getTopUpHistory()
    {
        try {
            $history = $this->agenService->getTopUpHistory();

            if ($history->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => 'Tidak ada riwayat top-up saldo yang ditemukan.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Riwayat top-up saldo berhasil diambil.',
                'data' => $history
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal mengambil riwayat top-up saldo.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mengelola pengajuan upgrade kemitraan agen
    public function managePartnership(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required|in:Sukses,Ditolak',
            ]);

            $result = $this->agenService->updatePartnershipStatus($id, $validatedData['status']);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'data' => $result,
                'message' => 'Pengajuan kemitraan berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui status kemitraan',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Mengelola pengajuan topup saldo agen
    public function manageTopUpRequest(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'status' => 'required|in:Sukses,Ditolak',
            ]);

            $result = $this->agenService->updateTopUpStatus($id, $validatedData['status']);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'data' => $result,
                'message' => 'Pengajuan top up saldo berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal memperbarui status pengajuan top up saldo',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Menambahkan agen baru
    public function storeagen(Request $request)
    {
        try {
            // Validasi input agen, tanpa email dan password karena sudah ada di tabel users
            $validatedData = $request->validate([
                'partnership_id' => 'nullable|exists:partnerships,id',
                'submission_id' => 'required|exists:agen_submissions,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'required|string|max:15',
                'province_id' => 'nullable|exists:provinces,id',
                'regency_id' => 'nullable|exists:regencies,id',
                'district_id' => 'nullable|exists:districts,id',
                'full_address' => 'required|string|max:500',
                'building_type' => 'nullable|string|max:255',
                'building_status' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'balance' => 'nullable|integer',
                'bank_name' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'profile_img' => 'nullable|string|max:255',
            ]);

            // Ambil data pendaftaran agen
            $submission = AgenSubmissions::findOrFail($validatedData['submission_id']);

            // Cek apakah pendaftaran sudah disetujui
            if ($submission->approval != 1) {
                return response()->json([
                    'message' => 'Pendaftaran agen belum disetujui.',
                ], 400);
            }

            // Ambil data user_id dari pendaftaran agen yang disetujui
            $user_id = $submission->user_id; // Pastikan bahwa user_id ada di tabel agen_submissions

            // Menambahkan data agen baru
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
                'profile_img',
            ]);

            // Menambahkan user_id ke data agen
            $dataAgen['user_id'] = $user_id;

            // Menyimpan data agen
            $result = $this->agenService->storeAgenData($dataAgen);

            return response()->json([
                'data' => $result,
                'message' => 'Agen berhasil ditambahkan.',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal menambahkan agen',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function approveAgen(Request $request, $id)
    {
        try {
            // Validasi email dan password dari request
            $validatedData = $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
            ]);

            // Mengambil data agen yang pendaftarannya akan disetujui
            $submission = AgenSubmissions::findOrFail($id);

            // Mengubah status approval menjadi 1 (disetujui)
            $submission->approval = 1;  // Menyetujui pendaftaran
            $submission->save();

            // Ambil data dari pendaftaran agen untuk membuat akun
            $dataUser = [
                'first_name' => $submission->agen_first_name,
                'last_name' => $submission->agen_last_name,
                'email' => $validatedData['email'],  // Email yang dimasukkan saat approval
                'password' => bcrypt($validatedData['password']),  // Hash password
            ];

            // Role agen
            $role = 'Agen';

            // Membuat akun untuk agen yang disetujui
            $userdata = $this->userService->createUserWithRole($dataUser, $role);

            // Jika akun berhasil dibuat, beri respon
            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran agen disetujui dan akun berhasil dibuat.',
                'data' => $userdata,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menyetujui pendaftaran agen',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    // Menolak pendaftaran agen
    public function rejectAgen(Request $request, $id)
    {
        try {
            // Mengubah status approval menjadi 0 (ditolak)
            $submission = AgenSubmissions::findOrFail($id);
            $submission->approval = 0;  // Menolak pendaftaran
            $submission->save();

            return response()->json([
                'success' => true,
                'message' => 'Pendaftaran agen ditolak.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menolak pendaftaran agen',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
