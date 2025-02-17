<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Services\SProvider\SProviderService;
use App\Services\SType\STypeService;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $serviceproviderService, $serviceTypeService;

    public function __construct(
        SProviderService $serviceproviderService,
        STypeService $serviceTypeService)
    {
        $this->serviceproviderService = $serviceproviderService;
        $this->serviceTypeService = $serviceTypeService;
    }

    public function availableService(Request $request)
    {
        $result = $this->serviceproviderService->getAllWithSearch($request);
        // return view('',['availableService'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // add service with service type
    public function addService(Request $request)
    {
        $dataServiceProvider = $request->only([
            'provider_name',
            'courier_code',
            'logo',
        ]);

        try {
            $serviceProviderdata = $this->serviceproviderService->storeServiceData($dataServiceProvider);
            $dataServiceType = $request->only([
                'type_name',
                'note',
            ]);
            $dataServiceType['service_provider_id'] = $serviceProviderdata['id'];

            $result = [
                'Success' => true,
                'Code' => 200,
            ];
            try {
                $result['data'] = $this->serviceTypeService->storeServiceData($dataServiceType);
            } catch (Exception $e) {
                $this->serviceproviderService->delete($serviceProviderdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage(),
                ];
            }
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        // return view('',['result'=>$result]); -> better redirect to available service 
        return response()->json($result);
    }

    // add service type only
    public function addServiceType(Request $request, $id)
    {
        $dataServiceType = $request->only([
            'name',
            'note',
        ]);
        $dataServiceType['service_provider_id'] = $id;

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->serviceTypeService->storeServiceData($dataServiceType);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }

    // update service provider
    public function updateServiceProvider(Request $request, $id)
    {
        $dataServiceProvider = $request->only([
            'name',
            'courier_code',
            'logo',
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];

        try {
            $result['data'] = $this->serviceproviderService->updateData($id, $dataServiceProvider);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result);
    }

    // update service type
    public function updateServiceType(Request $request, $id)
    {
        $dataServiceType = $request->only([
            'name',
            'note',
            'service_provider_id',
        ]);
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->serviceTypeService->updateData($id, $dataServiceType);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }

    // Show service provider with detail
    public function showServiceProvider($id)
    {
        return $this->serviceproviderService->detailService($id);
    }

    // delete service provider
    public function deleteServiceProvider($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->serviceproviderService->delete($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }

    // delete servicer Type
    public function deleteServiceType($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->serviceTypeService->delete($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage(),
            ];
        }

        return response()->json($result);
    }
}
