<?php

namespace App\Services\CourierCommission;

use LaravelEasyRepository\BaseService;

interface CourierCommissionService extends BaseService{

   public function getCourierCommission($request);
   public function storeCourierWithDrawalData($dataCourier);
   public function courierWithdrawal($request);
   public function courierWithdrawalHistory($request);
   public function acceptCourierWithdrawal($id);
   public function declineCourierWithdrawal($id);
}
