<?php

namespace App\Repositories\Courier;

use LaravelEasyRepository\Repository;

interface CourierRepository extends Repository{

    public function getAllCouriersWithSearch($request);
    public function getCouriersByArea($adminHubArea);
    public function getDetailCourier($Id);
    public function storeCourierData(array $data);
    public function updateCourier($id, array $data);
   // public function confirmCourierRegistration($id);
}