<?php

namespace App\Services\Regency;

use LaravelEasyRepository\BaseService;

interface RegencyService extends BaseService{

    public function getAllRegencyWithSearch($request);
}
