<?php

namespace App\Repositories\PointTransaction;

use LaravelEasyRepository\Repository;

interface PointTransactionRepository extends Repository
{
    public function getAllPointTransactionWithSearch($request);
    public function getPointTransactionDetail($id);
    public function storePointTransactionData($data);
}
