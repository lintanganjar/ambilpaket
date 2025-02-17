<?php

namespace App\Services\Bank;

use LaravelEasyRepository\BaseService;

interface BankService extends BaseService
{
    public function getAllBankWithSearch($request);
}
