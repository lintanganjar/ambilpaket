<?php

namespace App\Services\Courier;

use LaravelEasyRepository\BaseService;

interface CourierService extends BaseService{

    public function getAllCouriersWithSearch($request);
    public function getCouriersInSameArea($adminHubArea);
    public function storeCourierData(array $data);
    public function getDetailCourier($Id);
    public function updateCourier($id, array $data);
    // public function confirmCourierRegistration($id);
    public function deleteCourierData($id);
}