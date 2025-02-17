<?php

namespace App\Services\PickupSchedule;

use LaravelEasyRepository\BaseService;

interface PickupScheduleService extends BaseService{

    public function getAllPickupScheduleWithSearch($request);

    public function getJadwalPickupAgenByArea($adminHubArea);

    public function storePickupSchedule($data);
}
