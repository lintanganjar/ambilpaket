<?php

namespace App\Services\Finance;

use LaravelEasyRepository\BaseService;

interface FinanceService extends BaseService{

    public function getAllFinanceWithSearch($request);

    public function getFinanceDetail($id);

    public function storeFinanceData($dataFinance);

    public function updateFinanceData($id, $data);

    public function deleteFinanceData($id);
}
