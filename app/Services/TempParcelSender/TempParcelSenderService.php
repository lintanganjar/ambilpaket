<?php

namespace App\Services\TempParcelSender;

use LaravelEasyRepository\BaseService;

interface TempParcelSenderService extends BaseService
{
    public function getTempParcelSenderDetail($parcelId);
    public function storeTempParcelSenderData($data);
    public function updateTempParcelSenderData($parcelId, $data);
    public function deleteTempParcelSenderData($parcelId);
}
