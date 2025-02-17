<?php

namespace App\Repositories\Bank;

use LaravelEasyRepository\Repository;

interface BankRepository extends Repository
{
    public function getAllBankWithSearch($request);
}
