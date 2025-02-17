<?php

namespace App\Repositories\TempParcelSender;

use LaravelEasyRepository\Repository;

interface TempParcelSenderRepository extends Repository
{
    public function getTempParcelSenderDetailByParcelId($parcelId);
    public function storeTempParcelSenderData($data);
}
