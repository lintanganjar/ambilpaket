<?php

namespace App\Services\PartnershipTransactions;

use LaravelEasyRepository\BaseService;

interface PartnershipTransactionsService extends BaseService{

    public function getHistoryWithSearch($request);
    
    public function getDetailPartnershipTransaction($id);

    public function storePartnershipTransactionData($dataRequest);
}
