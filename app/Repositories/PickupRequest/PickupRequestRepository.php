<?php

namespace App\Repositories\PickupRequest;

use LaravelEasyRepository\Repository;

interface PickupRequestRepository extends Repository{

    public function getAllWithSearch($request,bool $assigned = false);

    public function getDetailPickupRequest($id);
    
    public function getDetailPickupRequestByCustomerUmkmId($customerUmkmId);

    public function getPickupRequestsByArea($adminHubArea);

    public function storePickupRequest($data);

    public function updateStatus($id, $status);

    public function updateAgentForPickupRequest($pickupRequestId, $agentId);

    public function getAssignedPickupRequests($request);

}
