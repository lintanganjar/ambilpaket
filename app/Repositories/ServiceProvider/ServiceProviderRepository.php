<?php

namespace App\Repositories\ServiceProvider;

use LaravelEasyRepository\Repository;

interface ServiceProviderRepository extends Repository{

    public function getAllWithSearch($request);
    public function storeServiceData($data);
    public function detailService($id);
}
