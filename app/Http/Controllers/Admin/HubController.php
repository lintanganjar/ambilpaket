<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Services\Hubs\HubsService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HubController extends Controller
{
    protected $hubsService;

    public function __construct(HubsService $hubsService)
    {
        $this->hubsService = $hubsService;
    }

    /**
     * Menampilkan data HUB yang ditempati admin
     */
    public function hub(Request $request)
    {
        try {
            // Mendapatkan ID HUB dari data admin yang sedang login
            $admin = Auth::user(); 
            $hubId = $admin->hub_id; 

            if (!$hubId) {
                throw new Exception("ID HUB tidak ditemukan untuk admin ini.");
            }

            // Mendapatkan detail HUB menggunakan HubsService
            $hubData = $this->hubsService->getHubDetail($hubId);

            if (!$hubData) {
                throw new Exception("Data HUB tidak ditemukan.");
            }

            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => true,
                    'Code' => 200,
                    'Data' => $hubData,
                ]);
            }

            // Logika untuk Web
            //return view('hub-view', ['hub' => $hubData]);
        } catch (Exception $e) {
            if ($request->wantsJson()) {
                // Logika untuk API
                return response()->json([
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                ], 500);
            }

            // Logika untuk Web
           // return redirect()->back()->withErrors('Gagal mengambil data HUB: ' . $e->getMessage());
        }
    }

    public function index(Request $request){
        $hubs = $this->hubsService->getAllHubWithSearch($request);
        return view('pages.admin-hub.data-master.data-hub.index',compact('hubs'));
    }
}
