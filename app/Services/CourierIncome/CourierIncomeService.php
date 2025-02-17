<?php

namespace App\Services\CourierIncome;

use LaravelEasyRepository\BaseService;

interface CourierIncomeService extends BaseService
{
    public function getAllCourierIncomeWithSearch($request);
    public function getCourierIncomeDetail($id);
    public function storeCourierIncome($data);
    public function updateCourierIncome($id, $data);
    public function deleteCourierIncome($id);
}
