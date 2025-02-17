<?php

namespace App\Services\SProvider;

use LaravelEasyRepository\BaseService;

interface SProviderService extends BaseService{

    public function getAllWithSearch($request);
    public function detailService($id);
    public function storeServiceData($data);
    public function updateData($id,$data);
}
