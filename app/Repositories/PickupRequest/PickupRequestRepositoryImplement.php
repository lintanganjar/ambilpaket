<?php

namespace App\Repositories\PickupRequest;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\PickUpRequest;
use Illuminate\Support\Facades\DB;

class PickupRequestRepositoryImplement extends Eloquent implements PickupRequestRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(PickUpRequest $model)
    {
        $this->model = $model;
    }
    public function getAllWithSearch($request, bool $assigned = false)
    {
        $query = $this->model->query();
        // Filter berdasarkan status
        if ($request->status && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        return $query->paginate(20);
    }
    public function getDetailPickupRequest($id)
    {
        return $this->model->find($id);
    }
    public function getDetailPickupRequestByCustomerUmkmId($customerUmkmId)
    {
        return $this->model
            ->where('customer_umkm_id', $customerUmkmId)
            ->with('customerUmkm')
            ->orderBy('created_at', 'desc')
            ->first();
    }
    public function getPickupRequestsByArea($adminHubArea)
    {
        return DB::table('pick_up_request')
            ->join('umkms', 'pick_up_request.customer_umkm_id', '=', 'umkms.id')
            ->where('umkms.province_id', $adminHubArea['province_id'])
            ->where('umkms.regency_id', $adminHubArea['regency_id'])
            ->where('umkms.district_id', $adminHubArea['district_id'])
            ->select('pick_up_request.*')
            ->get();
    }
    public function storePickupRequest($data)
    {
        $pickupRequest = new $this->model;
        $pickupRequest->customer_umkm_id = $data['customer_umkm_id'];
        $pickupRequest->agen_id = $data['agen_id'] ?? null;
        $pickupRequest->parcel_average_per_day = $data['parcel_average_per_day'];
        $pickupRequest->parcel_type = $data['parcel_type'];
        $pickupRequest->days_of_pickup = $data['days_of_pickup'];
        $pickupRequest->time_of_pickup = $data['time_of_pickup'];
        $pickupRequest->reason = $data['reason'] ?? null;
        $pickupRequest->status = $data['status'] ?? 'Menunggu';

        $pickupRequest->save();

        return $pickupRequest;
    }
    public function updateStatus($id, $status)
    {
        $pickupRequest = $this->model->find($id);

        if (!$pickupRequest) {
            return false;
        }

        $pickupRequest->status = $status;
        $pickupRequest->save();

        return $pickupRequest;
    }
    public function updateAgentForPickupRequest($pickupRequestId, $agentId)
    {
        return DB::table('pick_up_request')
            ->where('id', $pickupRequestId)
            ->update([
                'agen_id' => $agentId,
                'is_assigned' => true
            ]);
    }
    public function getAssignedPickupRequests($request)
    {
        return $this->model->where('is_assigned', 1) 
            ->paginate(20); 
    }
}
