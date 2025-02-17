<?php

namespace App\Services\TempParcel;

use LaravelEasyRepository\BaseService;

interface TempParcelService extends BaseService
{
    public function getAllTempParcelWithSearch($request);
    public function getTempParcelDetail($id);
    public function storeTempParcelData($data);
    public function updateTempParcelData($id, $data);
    public function deleteTempParcelData($id);
}
