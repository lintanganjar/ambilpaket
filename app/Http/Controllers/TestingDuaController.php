<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\Type\TypeService;
use App\Services\User\UserService;
use App\Services\Merch\MerchService;
use App\Services\Price\PriceService;
use App\Services\Courier\CourierService;
use App\Services\Parcels\ParcelsService;
use App\Services\Timeline\TimelineService;
use App\Services\SProvider\SProviderService;
use App\Services\MerchRequest\MerchRequestService;
use App\Services\TopUpTransaction\TopUpTransactionService;
use App\Services\CourierCommission\CourierCommissionService;
use App\Services\CourierSubmission\CourierSubmissionService;
use App\Services\PartnershipTransactions\PartnershipTransactionsService as PartnershipTransactionsPartnershipTransactionsService;

class TestingDuaController extends Controller
{
    // Parcels Services | Courier Service | Merch Service | Request Merch Service
    private $parcelsService, $courierService, $merchService, $merchRequestService;
        
    // Service Provider Services | Service Type Service  | Timeline Service
    private $serviceproviderService, $servicetypesService, $timelineService;
    
    // Partnership Transaction Services | Price Service 
    private $partnershiptransactionsService, $priceService;
        
    // Top Up Transaction Services | Courier Commission Service 
    private $topuptransactionService, $couriercommissionService;

    private $userService, $courierSubmissionService;

    public function __construct(
        ParcelsService $parcelsService,
        CourierService $courierService,
        MerchService $merchService,
        MerchRequestService $merchRequestService,
        SProviderService $serviceproviderService,
        PartnershipTransactionsPartnershipTransactionsService $partnershiptransactionsService,
        PriceService $priceService,
        TopUpTransactionService $topUpTransactionService,
        CourierCommissionService $couriercommissionService,
        TypeService $servicetypesService,
        TimelineService $timelineService,
        UserService $userService,
        CourierSubmissionService $courierSubmissionService,
    ) {
        $this->parcelsService = $parcelsService;
        $this->courierService = $courierService;
        $this->merchService = $merchService;
        $this->merchRequestService = $merchRequestService;
        $this->serviceproviderService = $serviceproviderService;
        $this->partnershiptransactionsService = $partnershiptransactionsService;
        $this->priceService = $priceService;
        $this->topuptransactionService = $topUpTransactionService;
        $this->couriercommissionService = $couriercommissionService;
        $this->servicetypesService = $servicetypesService;
        $this->timelineService = $timelineService;
        $this->userService = $userService; 
        $this->courierSubmissionService = $courierSubmissionService;
    }

    // <-------------------------------- Start of Parcels Modul -------------------------------->
    // Get All Parcels with optional search
    public function index(Request $request)
    {
        $request->get('search', null);
        $parcels = $this->parcelsService->getAllWithSearch($request);

        if ($parcels->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data yang ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $parcels,
        ]);
    }

    // Get Parcel by Resi Number
    public function showByResi($resi)
    {
        $parcel = $this->parcelsService->getByResi($resi);
        if ($parcel[0]['code']==200) {
            foreach ($parcel[0]['timeline'] as $timeline) {
                $timeline['parcel_id']=$parcel[1]['id'];
                try {
                    $timeline = $this->timelineService->storeTimeline($timeline);
                } catch (Exception $e) {
                    return response()->json([
                        'message' => $e->getMessage()
                    ], 400);
                }
            }
        } else {
            return $parcel;
        }       
        $timelineParcel = $this->timelineService->showTimelineWithParcelId($parcel[1]['id']);
        if (!$parcel) {
            return response()->json(['message' => 'Parcel not found'], 404);
        }

        return ['data parcel' => $parcel[1],'data Timeline' => $timelineParcel];
    }

    // Insert a new Parcel
    public function store(Request $request)
    {
        $data = $request->all();

        try {
            $parcel = $this->parcelsService->insertParcel($data);
            return response()->json($parcel, 201);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Update an existing Parcel
    public function update(Request $request, $id)
    {
        $data = $request->all();

        try {
            $updatedParcel = $this->parcelsService->updateParcel($id, $data);
            return response()->json($updatedParcel);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Delete a Parcel by ID
    public function destroy($id)
    {
        try {
            $this->parcelsService->deleteParcel($id);
            return response()->json(['message' => 'Parcel deleted successfully']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    // Update Timeline of a Parcel by Resi Number
    public function updateTimeline(Request $request, $resi)
    {
        $timelineData = $request->only(['date', 'detail']);

        try {
            $timeline = $this->timelineService->updateTimeline($resi, $timelineData);
            return response()->json($timeline, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unable to update timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Assign a Courier to a Parcel
    public function assignCourier(Request $request, $parcelId)
    {
        $courierId = $request->get('courier_id');

        try {
            $updatedParcel = $this->parcelsService->assignCourierToParcel($parcelId, $courierId);
            return response()->json($updatedParcel);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 400);
        }
    }
    // <-------------------------------- End of Parcels Modul -------------------------------->

    // <-------------------------------- Start of Courier Modul -------------------------------->
    public function getAllCouriersWithSearch(Request $request)
    {
        $result = $this->courierService->getAllCouriersWithSearch($request);
        return response()->json(['Success' => true, 'Code' => 200, 'data' => $result]);
    }

    public function getDetailCourier($userId)
    {
        $result = $this->courierService->getDetailCourier($userId);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
    
    public function createCourierWithUser(Request $request)
    {
        // Get the user data from the request
        $dataUser = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
        ]);
        $role = 'courier';

        try {
            // Create the user with the 'courier' role
            $userdata = $this->userService->createUserWithRole($dataUser, $role);

            $dataCourier = $request->only([
                'courier_type',
                'first_name',
                'last_name',
                'phone_number',
                'gender',
                'profile_img',
                'area_id',
                'balance',
                'bank_name',
                'account_name',
                'account_number',
            ]);

            $dataCourier['user_id'] = $userdata['id'];

            // Default success response
            $result = [
                'Success' => true,
                'Code' => 200,
            ];

            try {
                // Store the courier data
                $result['data'] = $this->courierService->storeCourierData($dataCourier);
            } catch (Exception $e) {
                // If there is an error, delete the user and return error
                $this->userService->deleteUserData($userdata['id']);
                $result = [
                    'Success' => false,
                    'Code' => 500,
                    'Error' => $e->getMessage() . ', Error Courier Creating .',
                    'Check' => $dataCourier,
                ];
            }
        } catch (Exception $e) {
            // Error when creating the user
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage() . ', Error User Creating .'
            ];
        }

        return response()->json($result, $result['Code']);
    }


    public function updateCourier(Request $request, $id)
    {
        $data = $request->only([
            'kurir_type',
            'full_name',
            'phone_number',
            'gender',
            'profile_img',
            'area_id',
            'balance',
            'bank_name',
            'account_name',
            'account_number'
        ]);

        $result = $this->courierService->updateCourier($id, $data);
        return response()->json(['Success' => true, 'Code' => 200, 'data' => $result]);
    }

    // public function confirmCourierRegistration($id)
    // {
    //     $result = $this->courierService->confirmCourierRegistration($id);
    //     return response()->json(['Success' => true, 'Code' => 200, 'data' => $result]);
    // }

    // <-------------------------------- End of Courier Modul -------------------------------->


    // <-------------------------------- Start of Courier Submissions Modul -------------------------------->

    // Insert New Courier Submission
    public function createCourierSubmission(Request $request)
    {
        $dataCourierSub = $request->only([
            'courier_type',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'gender',
            'profile_img',
            'area_id',
            'balance',
            'bank_name',
            'account_name',
            'account_number'
        ]);

        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->courierSubmissionService->storeCourierSubmission($dataCourierSub)
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

    // Confirm Courier Registration
    public function confirmCourierRegistration($submissionId)
    {
        try {
            $result = [
                'Success' => true,
                'Code' => 200,
                'Data' => $this->courierSubmissionService->confirmCourierRegistration($submissionId)
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
    // <-------------------------------- End of Courier Submissions Modul -------------------------------->


    // <-------------------------------- Start of Merch Modul -------------------------------->
    // Show Merch With Filter 
    public function showMerch(Request $request)
    {
        $result = $this->merchService->getAllMerchWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Show Merch Detail
    public function getMerchDetail($id)
    {
        $result = $this->merchService->getMerchDetail($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Insert New Merch
    public function createMerch(Request $request)
    {
        $data = $request->only([
            'name',
            'stock',
            'merchandise_img',
            'point',
            'available'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchService->storeMerchData($data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Update Merch Data
    public function updateMerch(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'stock',
            'merchandise_img',
            'point',
            'available'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchService->updateMerchData($id, $data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Delete Merch Data
    public function deleteMerch($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['is_Delete'] = $this->merchService->deleteMerch($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of Merch Modul -------------------------------->

    // <-------------------------------- Start of Merch Request Modul -------------------------------->
    // Show Merch Request With Filter
    public function showMerchRequest(Request $request)
    {
        $result = $this->merchRequestService->getAllRequestMerchWithSearch($request);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Show Merch Request Detail
    public function getMerchRequestDetail($id)
    {
        $result = $this->merchRequestService->getDetailRequestMerch($id);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    // Insert New Merch Request
    public function createMerchRequest(Request $request)
    {
        $data = $request->only([
            'merchandise_id',
            'customer_id',
            'status',
            'request_date',
            'amount',
            'note'
        ]);

        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchRequestService->storeRequestMerchData($data);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Create Parcel From Merch Request
    public function createParcel($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchRequestService->createParcelByRequestMerch($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }

    // Decline Merch Request
    public function declineMerchRequest($id)
    {
        $result = [
            'Success' => true,
            'Code' => 200,
        ];
        try {
            $result['data'] = $this->merchRequestService->declineRequestMerch($id);
        } catch (Exception $e) {
            $result = [
                'Success' => false,
                'Code' => 500,
                'Error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['Code']);
    }
    // <-------------------------------- End of Merch Request Modul -------------------------------->


    // <-------------------------------- Start of Keuangan Modul -------------------------------->

    // <-------------------------------- Start of ServiceProvider Modul -------------------------------->
    /**
     * Display a listing of service providers with optional search.
     */
    public function indexServiceProvider(Request $request)
    {
        // Mendapatkan semua service provider dengan filter pencarian jika ada
        $data = $this->serviceproviderService->getAllWithSearch($request);
        return response()->json($data);
    }

    // <-------------------------------- End of Service Provider Modul -------------------------------->
    // <-------------------------------- Start of ServiceProvider Modul -------------------------------->
    public function getServiceProviderTypes(Request $request)
    {
        // Mengambil tipe penyedia layanan yang unik
        $types = $this->servicetypesService->getAllServiceTypes($request);
        return response()->json($types);
    }
    // <-------------------------------- End of Service Types Modul -------------------------------->

    // <-------------------------------- Start of PartnershipTransactions Modul -------------------------------->
    public function getHistoryWithSearch(Request $request)
    {
        $data = $this->partnershiptransactionsService->getHistoryWithSearch($request);
        return response()->json($data);
    }
    // <-------------------------------- End of PartnershipTransactions Modul -------------------------------->

    // <-------------------------------- Start of ServicePrice Modul -------------------------------->
    public function getAllWithSearch(Request $request)
    {
        $data = $this->priceService->getAllWithSearch($request);
        return response()->json($data);
    }
    // <-------------------------------- End of ServicePrice Modul -------------------------------->

    // <-------------------------------- Start of TopUpTransaction Modul -------------------------------->
    public function getTopupHistory(Request $request)
    {
        $data = $this->topuptransactionService->getTopupHistoryWithSearch($request);
        return response()->json($data);
    }
    // <-------------------------------- End of TopUpTransaction Modul -------------------------------->

    // <-------------------------------- Start of CourierCommission Modul -------------------------------->
    public function getCourierCommission(Request $request)
    {
        $data = $this->couriercommissionService->getCourierCommission($request);
        return response()->json($data);
    }
    // <-------------------------------- End of CourierCommission Modul -------------------------------->
    // <-------------------------------- End of Keuangan Modul -------------------------------->
}
