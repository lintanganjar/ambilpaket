<?php

namespace App\Repositories\Merch;

use LaravelEasyRepository\Repository;

interface MerchRepository extends Repository{

    public function getAllMerchWithSearch($request);
    
    public function getDetailMerch($id);
    
    public function getMerchHistory();

    public function storeMerchData($dataMerch);

    public function deleteMerch($id);

    public function updateMerchStock($id, $data);
}
