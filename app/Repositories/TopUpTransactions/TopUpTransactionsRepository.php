<?php

namespace App\Repositories\TopUpTransactions;

use LaravelEasyRepository\Repository;

interface TopUpTransactionsRepository extends Repository{

    public function getTopupHistoryWithSearch($request);

    public function getDetailTopUpTransaction($id);

    public function storeTopUpTransactionData($dataRequest);

    public function topUpSaldo($request);
    
    public function topUpSaldoHistory($request);
}
