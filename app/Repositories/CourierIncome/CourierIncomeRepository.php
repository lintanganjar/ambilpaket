<?php

namespace App\Repositories\CourierIncome;

use LaravelEasyRepository\Repository;

interface CourierIncomeRepository extends Repository
{
    public function getAllCourierIncomeWithSearch($request);
    public function getCourierIncomeDetail($id);
    public function storeCourierIncome($data);
}
