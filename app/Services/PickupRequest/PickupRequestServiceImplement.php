<?php

namespace App\Services\PickupRequest;

use LaravelEasyRepository\Service;
use App\Repositories\PickupRequest\PickupRequestRepository;
use App\Repositories\PickupSchedule\PickupScheduleRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class PickupRequestServiceImplement extends Service implements PickupRequestService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $pickupScheduleRepository;

    public function __construct(
        PickupRequestRepository $mainRepository,
        PickupScheduleRepository $pickupScheduleRepository
    ) {
        $this->mainRepository = $mainRepository;
        $this->pickupScheduleRepository = $pickupScheduleRepository;
    }

    public function getAllPickupRequestWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getPickupRequestDetail($id)
    {
        try {
            $pickupRequest = $this->mainRepository->getDetailPickupRequest($id);
            if (!$pickupRequest) {
                throw new Exception("Pickup Request with ID {$id} not found");
            }
            return $pickupRequest;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getPickupRequestDetailByCustomerUmkmId($customerUmkmId)
    {
        try {
            $pickupRequest = $this->mainRepository->getDetailPickupRequestByCustomerUmkmId($customerUmkmId);
            return $pickupRequest;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getPickupRequestsInSameArea($adminHubArea)
    {
        try {
            return $this->mainRepository->getPickupRequestsByArea($adminHubArea);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    public function storePickupRequest($data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'customer_umkm_id' => 'required|exists:customer_umkms,id',
                'agen_id' => 'nullable|exists:agens,id',
                'parcel_average_per_day' => 'required|integer',
                'parcel_type' => 'required|string|max:255',
                'days_of_pickup' => 'required|array',
                'days_of_pickup.*' => 'string',
                'time_of_pickup' => 'required|date_format:H:i',
                'reason' => 'nullable|string',
                'status' => 'required|string|in:Menunggu,Diterima,Ditolak'
            ], [
                'customer_umkm_id.required' => 'ID Customer UMKM wajib diisi.',
                'customer_umkm_id.exists' => 'Customer UMKM tidak ditemukan.',
                'agen_id.exists' => 'Agen tidak ditemukan.',
                'parcel_average_per_day.required' => 'Rata-rata paket per hari wajib diisi.',
                'parcel_average_per_day.integer' => 'Rata-rata paket per hari harus berupa angka.',
                'parcel_type.required' => 'Tipe paket wajib diisi.',
                'parcel_type.string' => 'Tipe paket harus berupa text.',
                'parcel_type.max' => 'Tipe paket maksimal 255 karakter.',
                'days_of_pickup.*.string' => 'Hari penjemputan harus berupa teks.',
                'time_of_pickup.required' => 'Waktu penjemputan wajib diisi.',
                'time_of_pickup.date_format' => 'Waktu penjemputan tidak valid. Format yang benar: HH:mm.',
                'reason.required' => 'Alasan wajib diisi.',
                'reason.string' => 'Alasan harus berupa teks.',
                'status.required' => 'Status wajib diisi.',
                'status.in' => 'Status tidak valid.'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $data['days_of_pickup'] = isset($data['days_of_pickup']) ? json_encode($data['days_of_pickup']) : null;

            $result = $this->mainRepository->storePickupRequest($data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updatePickupRequest($id, $data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'agen_id' => 'nullable|exists:agens,id',
                'parcel_average_per_day' => 'nullable|integer',
                'parcel_type' => 'nullable|string|max:255',
                'days_of_pickup' => 'nullable|array',
                'days_of_pickup.*' => 'string',
                'time_of_pickup' => 'nullable|date_format:H:i',
                'reason' => 'nullable|string',
                'status' => 'nullable|string|in:Menunggu,Diterima,Ditolak'
            ], [
                'agen_id.exists' => 'Agen tidak ditemukan.',
                'parcel_average_per_day.integer' => 'Rata-rata paket per hari harus berupa angka.',
                'parcel_type.string' => 'Tipe paket harus berupa text.',
                'parcel_type.max' => 'Tipe paket maksimal 255 karakter.',
                'days_of_pickup.*.string' => 'Hari penjemputan harus berupa teks.',
                'time_of_pickup.date_format' => 'Waktu penjemputan tidak valid. Format yang benar: HH:mm.',
                'reason.string' => 'Alasan harus berupa teks.',
                'status.in' => 'Status tidak valid.'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $data['days_of_pickup'] = isset($data['days_of_pickup']) ? json_encode($data['days_of_pickup']) : null;

            $result = $this->mainRepository->update($id, $data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updateStatus($id, $status)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make(['status' => $status], [
                'status' => 'required|string|in:Menunggu,Diterima,Ditolak'
            ], [
                'status.required' => 'Status wajib diisi.',
                'status.in' => 'Status tidak valid.'
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $pickupRequest = $this->mainRepository->getDetailPickupRequest($id);
            if (!$pickupRequest) {
                throw new Exception("Pickup Request with ID {$id} not found");
            }

            $result = $this->mainRepository->updateStatus($id, $status);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function acceptRequest($id)
    {
        try {
            DB::beginTransaction();

            $pickupRequest = $this->mainRepository->getDetailPickupRequest($id);
            if (!$pickupRequest) {
                throw new Exception("Pickup Request with ID {$id} not found");
            }

            if (in_array($pickupRequest->status, ['Diterima', 'Ditolak'])) {
                throw new Exception("Pickup Request with ID {$id} is already processed");
            }

            $pickupScheduleData = [
                'request_id' => $pickupRequest->id,
                'agen_id' => $pickupRequest->agen_id,
                'customer_umkm_id' => $pickupRequest->customer_umkm_id,
            ];
            $this->pickupScheduleRepository->storePickupSchedule($pickupScheduleData);

            $updatedPickupRequest = $this->mainRepository->updateStatus($id, 'Diterima');

            DB::commit();
            return $updatedPickupRequest;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function declineRequest($id)
    {
        try {
            DB::beginTransaction();

            $pickupRequest = $this->mainRepository->getDetailPickupRequest($id);
            if (!$pickupRequest) {
                throw new Exception("Pickup Request with ID {$id} not found");
            }

            if (in_array($pickupRequest->status, ['Diterima', 'Ditolak'])) {
                throw new Exception("Pickup Request with ID {$id} is already processed");
            }

            $updatedPickupRequest = $this->mainRepository->updateStatus($id, 'Ditolak');

            DB::commit();
            return $updatedPickupRequest;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
    public function assignToAgent($pickupRequestId, $agentId)
    {
        try {
            DB::beginTransaction();

            $pickupRequest = $this->mainRepository->getDetailPickupRequest($pickupRequestId);
            if (!$pickupRequest) {
                throw new Exception("Pickup Request with ID {$pickupRequestId} not found");
            }

            if ($pickupRequest->is_assigned == 1) {
                throw new Exception("This Pickup Request has already been assigned. Please use a different request ID.");
            }

            if ($pickupRequest->status !== 'Menunggu') {
                throw new Exception("Pickup Request with ID {$pickupRequestId} is already processed or not in a valid state.");
            }

            $agent = $this->pickupScheduleRepository->getAgentById($agentId);
            if (!$agent) {
                throw new Exception("Agent with ID {$agentId} not found");
            }

            $updatedPickupRequest = $this->mainRepository->updateAgentForPickupRequest($pickupRequestId, $agentId);

            DB::table('pick_up_request')
                ->where('id', $pickupRequestId)
                ->update(['is_assigned' => 1]);

            DB::commit();

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Pickup request successfully assigned to agent.',
                'data' => $updatedPickupRequest
            ]);
        } catch (Exception $e) {
            // Rollback the transaction if there was an error
            DB::rollback();
            return response()->json([
                'status' => false,
                'code' => 500,
                'message' => "Failed to assign request to agent: " . $e->getMessage()
            ]);
        }
    }
    
    public function getAssignedPickupRequests($request)
    {
        return $this->mainRepository->getAssignedPickupRequests($request);
    }
}
