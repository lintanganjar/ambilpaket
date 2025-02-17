<?php

namespace App\Services\TopUpTransaction;

use LaravelEasyRepository\BaseService;

interface TopUpTransactionService extends BaseService{

    public function getTopupHistoryWithSearch($request);

    public function getDetailTopUpTransaction($id);

    public function storeTopUpTransactionData($dataRequest);

    public function topUpSaldo($request);

    public function topUpSaldoHistory($request);

    public function acceptTopUpSaldo($id);
    
    public function declineTopUpSaldo($id);
}
