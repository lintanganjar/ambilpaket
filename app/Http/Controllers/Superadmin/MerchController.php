<?php

namespace App\Http\Controllers\Superadmin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MerchRequest\MerchRequestRepository;
use App\Services\Merch\MerchService;
use App\Services\MerchRequest\MerchRequestService;

class MerchController extends Controller
{
    protected $merchService;
    protected $merchRequestService;

    public function __construct(
        MerchService $merchService,
        MerchRequestService $merchRequestService
    ) {
        $this->merchService = $merchService;
        $this->merchRequestService = $merchRequestService;
    }

    public function stock(Request $request)
    {
        try {
            // Mengambil data stok merch dari API eksternal atau database
            $merchData = $this->merchService->getAllMerchWithSearch($request);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $merchData, // Mengembalikan data merch
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal mengambil data stok merch: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function showMerch($id)
    {
        try {
            // Memanggil service untuk mendapatkan detail merchandise
            $merch = $this->merchService->getMerchDetail($id);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $merch
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal mengambil detail merchandise: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function addMerch(Request $request)
    {
        try {
            $dataMerch = $request->only(['name', 'stock', 'merchandise_img', 'point', 'available']);

            // Memanggil service untuk menyimpan data merchandise
            $result = $this->merchService->storeMerchData($dataMerch);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Merchandise berhasil ditambahkan.',
                'Data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal menambahkan merchandise: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateMerch($id, Request $request)
    {
        try {
            $dataMerch = $request->only(['name', 'stock', 'merchandise_img', 'point', 'available']);

            // Memanggil service untuk mengupdate data merchandise
            $result = $this->merchService->updateMerchData($id, $dataMerch);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Merchandise berhasil diperbarui.',
                'Data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal memperbarui merchandise: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deleteMerch($id)
    {
        try {
            // Memanggil service untuk menghapus merchandise
            $result = $this->merchService->deleteMerch($id);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Merchandise berhasil dihapus.',
                'Data' => $result
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal menghapus merchandise: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function waitingList()
    {
        try {
            // Mengambil data waiting list permintaan merch
            $waitingList = $this->merchRequestService->getWaitingList();

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $waitingList, // Mengembalikan data waiting list
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal mengambil data waiting list: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function sendMerchForm(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'merchandise_id' => 'required|exists:merchandise,id', // Validasi ID merchandise
            'customer_id' => 'required|exists:customers,id', // Validasi ID customer
            'amount' => 'required|integer|min:1', // Validasi jumlah
            'note' => 'nullable|string|max:255', // Validasi catatan (opsional)
        ]);

        // Mengambil data dari request
        $dataRequest = $request->only(['merchandise_id', 'customer_id', 'amount', 'note']);

        try {
            // Mengirim data pengiriman merch
            $requestMerch = $this->merchRequestService->storeRequestMerch($dataRequest);

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Permintaan pengiriman merch berhasil.',
                'Data' => $requestMerch,  // Mengembalikan data permintaan yang telah disimpan
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal mengirim merch: ' . $e->getMessage(),
            ], 500);
        }
    }


    public function history()
    {
        try {
            // Mengambil riwayat permintaan merch
            $history = $this->merchService->getMerchHistory();

            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $history, // Mengembalikan data history
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Code' => 500,
                'Error' => 'Gagal mengambil riwayat permintaan merch: ' . $e->getMessage(),
            ], 500);
        }
    }
}
