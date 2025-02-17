<?php

namespace App\Repositories\PartnershipTransaction;

use LaravelEasyRepository\Repository;

interface PartnershipTransactionRepository extends Repository{

    public function getHistoryWithSearch($request);

    public function getDetailPartnershipTransaction($id);

    public function storePartnershipTransactionData($dataRequest);
}
