<?php

namespace App\Services\PointTransaction;

use LaravelEasyRepository\BaseService;

interface PointTransactionService extends BaseService
{
    public function getAllPointTransactionWithSearch($request);
    public function getPointTransactionDetail($id);
    public function storePointTransactionData($data);
    public function updatePointTransactionData($id, $data);
    public function deletePointTransactionData($id);
}
