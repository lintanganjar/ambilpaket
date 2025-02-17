<?php

namespace App\Repositories\MerchRequest;

use LaravelEasyRepository\Repository;

interface MerchRequestRepository extends Repository{

    public function getAllRequestMerchWithSearch($request);

    public function getDetailRequestMerch($id);

    public function getWaitingList();

    public function storeRequestMerchData($dataRequest);

    public function updateRequestMerchData($id, $data);
}
