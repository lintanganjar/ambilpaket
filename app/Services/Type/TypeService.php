<?php

namespace App\Services\Type;

use LaravelEasyRepository\BaseService;

interface TypeService extends BaseService{

    public function getAllServiceTypes($request);
}
