<?php

namespace App\Services\TempParcelReceiver;

use LaravelEasyRepository\BaseService;

interface TempParcelReceiverService extends BaseService
{
    public function getTempParcelReceiverDetail($parcelId);
    public function storeTempParcelReceiverData($data);
    public function updateTempParcelReceiverData($parcelId, $data);
    public function deleteTempParcelReceiverData($parcelId);
}
