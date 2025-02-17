<?php

namespace App\Repositories\Finance;

use LaravelEasyRepository\Repository;

interface FinanceRepository extends Repository{

    public function getAllFinanceWithSearch($request);
    
    public function getDetailFinance($id);
    
    public function storeFinanceData($dataFinance);
}
