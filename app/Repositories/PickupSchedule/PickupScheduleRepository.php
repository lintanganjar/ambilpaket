<?php

namespace App\Repositories\PickupSchedule;

use LaravelEasyRepository\Repository;

interface PickupScheduleRepository extends Repository{

    public function getAllWithSearch($request);

    public function getAgentById($agenId);

    public function getJadwalPickupAgenByArea($adminHubArea);


    public function storePickupSchedule($data);
}
