<?php

namespace App\Services\MerchRequest;

use LaravelEasyRepository\BaseService;

interface MerchRequestService extends BaseService{

    public function getAllRequestMerchWithSearch($request);

    public function getDetailRequestMerch($id);
    
    public function getWaitingList();
    
    public function storeRequestMerchData($dataRequest);

    public function createParcelByRequestMerch($id);

    public function declineRequestMerch($id);
}
