<?php

namespace App\Repositories\TempParcelReceiver;

use LaravelEasyRepository\Repository;

interface TempParcelReceiverRepository extends Repository
{
    public function getTempParcelReceiverDetailByParcelId($parcelId);
    public function storeTempParcelReceiverData($data);
}
