<?php

namespace App\Repositories\ServicePrice;

use LaravelEasyRepository\Repository;

interface ServicePriceRepository extends Repository{

    public function getAllWithSearch($request);
}

