<?php

namespace App\Services\Price;

use LaravelEasyRepository\BaseService;

interface PriceService extends BaseService{

    public function getAllWithSearch($request);
}
