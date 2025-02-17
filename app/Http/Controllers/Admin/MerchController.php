<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Services\Merch\MerchService;
use App\Services\MerchRequest\MerchRequestService;
use App\Services\Parcels\ParcelsService;
use App\Services\Province\ProvinceService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

class MerchController extends Controller
{
    protected $merchService;
    protected $merchRequestService;
    protected $provinceService;
    protected $parcelsService;

    public function __construct(MerchService $merchService,
                                ProvinceService $provinceService,
                                MerchRequestService $merchRequestService,
                                ParcelsService $parcelsService)
    {
        $this->merchService = $merchService;
        $this->merchRequestService = $merchRequestService;
        $this->provinceService = $provinceService;
        $this->parcelsService = $parcelsService;
    }

    // public function stock(Request $request)
    // {
    //     try {
    //         // Mengambil data stok merch dari API eksternal atau database
    //         $merchData = $this->merchService->getAllMerchWithSearch($request);

    //         return response()->json([
    //             'Success' => true,
    //             'Code' => 200,
    //             'Data' => $merchData, // Mengembalikan data merch
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'Success' => false,
    //             'Code' => 500,
    //             'Error' => 'Gagal mengambil data stok merch: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function waitingList()
    // {
    //     try {
    //         // Mengambil data waiting list permintaan merch
    //         $waitingList = $this->merchService->getWaitingList();

    //         return response()->json([
    //             'Success' => true,
    //             'Code' => 200,
    //             'Data' => $waitingList, // Mengembalikan data waiting list
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'Success' => false,
    //             'Code' => 500,
    //             'Error' => 'Gagal mengambil data waiting list: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function sendMerchForm()
    // {
    //     // Form ini bisa berisi tampilan yang mengarah pada view, tapi karena kamu menggunakan JSON response, kita akan mengubahnya
    //     return response()->json([
    //         'Success' => true,
    //         'Code' => 200,
    //         'Message' => 'Form untuk mengirim merch berhasil dimuat.',
    //     ], 200);
    // }

    // public function sendMerch(Request $request)
    // {
    //     $data = $request->only(['merch_id', 'quantity', 'shipping_address']);

    //     try {
    //         // Mengirim data pengiriman merch
    //         $this->merchService->storeMerchData($data);

    //         return response()->json([
    //             'Success' => true,
    //             'Code' => 200,
    //             'Message' => 'Permintaan pengiriman merch berhasil.',
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'Success' => false,
    //             'Code' => 500,
    //             'Error' => 'Gagal mengirim merch: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }

    // public function history()
    // {
    //     try {
    //         // Mengambil riwayat permintaan merch
    //         $history = $this->merchService->getMerchHistory();

    //         return response()->json([
    //             'Success' => true,
    //             'Code' => 200,
    //             'Data' => $history, // Mengembalikan data history
    //         ], 200);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'Success' => false,
    //             'Code' => 500,
    //             'Error' => 'Gagal mengambil riwayat permintaan merch: ' . $e->getMessage(),
    //         ], 500);
    //     }
    // }
    
    public function stock(Request $request)
    {
        $merchData = $this->merchService->getAllMerchWithSearch($request);
        return view('pages.admin-hub.merch.stock.index', compact('merchData'));
    }

    public function pengiriman_baru(Request $request)
    {
        $province = $this->provinceService->getAllProvinceWithSearch($request);
        $merchData = $this->merchService->getAllMerchWithSearch($request);
        // dd($province->toArray());
        return view('pages.admin-hub.merch.sending.index', compact('merchData','province'));
    }

    public function pengiriman_baru_store(Request $request){
        try{
            $this->parcelsService->newParcel($request->only(['merch','receiver','status']));
            return redirect()->back()->with('success', 'data berhasil ditambahkan');
        }catch(Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function waiting_list(Request $request)
    {
        $merch_request = $this->merchRequestService->getAllRequestMerchWithSearch($request);
        // dd($merch_request->toArray());
        return view('pages.admin-hub.merch.waiting-list.index', compact('merch_request'));
    }

    public function riwayat(Request $request)
    {
        $merch_history = $this->merchService->getMerchHistory($request);
        // dd($merch_history->toArray());
        return view('pages.admin-hub.merch.history.index', compact('merch_history'));
    }
}
