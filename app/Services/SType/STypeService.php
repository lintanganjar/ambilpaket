<?php

namespace App\Services\SType;

use LaravelEasyRepository\BaseService;

interface STypeService extends BaseService{

    public function storeServiceData($data);
    public function updateData($id,$data);
}
