<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Hubs\HubsService;
use Exception;


class HubController extends Controller
{
    private $hubsService;

    public function __construct(HubsService $hubsService)
    {
        $this->hubsService = $hubsService;
    }

    public function index(Request $request)
    {
        try {
            $data = $this->hubsService->getAllHubWithSearch($request);
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
        $data = $request->only([
            'area_id',
            'name',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude'
        ]);

        try {
            $hub = $this->hubsService->storeHubData($data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $hub,
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
            'area_id',
            'name',
            'province_id',
            'regency_id',
            'district_id',
            'full_address',
            'latitude',
            'longitude',
        ]);

        try {
            $hub = $this->hubsService->updateHubData($id, $data);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Data' => $hub,
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
            $this->hubsService->deleteHubData($id);
            // return view('',['profile'=>$result]);
            return response()->json([
                'Success' => true,
                'Code' => 200,
                'Message' => 'Hub deleted successfully.',
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
