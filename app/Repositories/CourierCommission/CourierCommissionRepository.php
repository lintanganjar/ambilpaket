<?php

namespace App\Repositories\CourierCommission;

use LaravelEasyRepository\Repository;

interface CourierCommissionRepository extends Repository{

    public function getCourierCommissionWithSearch($request);
    public function storeCourierWithDrawalData($dataCourier);
    public function courierWithdrawal($request);
    public function courierWithdrawalHistory($request);
}
