<?php

namespace App\Services\PickupRequest;

use LaravelEasyRepository\BaseService;

interface PickupRequestService extends BaseService{

    public function getAllPickupRequestWithSearch($request);

    public function getPickupRequestDetail($id);
    
    public function getPickupRequestDetailByCustomerUmkmId($customerUmkmId);

    public function getPickupRequestsInSameArea($adminHubArea);

    public function storePickupRequest($data);
    
    public function updatePickupRequest($id, $data);

    public function updateStatus($id, $status);

    public function acceptRequest($id);

    public function declineRequest($id);

    public function assignToAgent($pickupRequestId, $agentId);

    public function getAssignedPickupRequests($request);
}
