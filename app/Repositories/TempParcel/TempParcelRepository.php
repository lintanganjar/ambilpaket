<?php

namespace App\Repositories\TempParcel;

use LaravelEasyRepository\Repository;

interface TempParcelRepository extends Repository
{
    public function getAllTempParcelWithSearch($request);
    public function getTempParcelDetail($id);
    public function storeTempParcelData($data);
}
