<?php

namespace App\Services\Merch;

use LaravelEasyRepository\BaseService;

interface MerchService extends BaseService{

    public function getAllMerchWithSearch($request);

    public function getMerchDetail($id);

    public function getMerchHistory();

    public function storeMerchData($dataMerch);

    public function updateMerchData($id, $data);

    public function deleteMerch($id);
}
