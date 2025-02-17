<?php

namespace App\Repositories\ServiceType;

use LaravelEasyRepository\Repository;

interface ServiceTypeRepository extends Repository{

    public function getAlltypesWithSearch($request);
    public function getTypeWithId($id);
    public function storeServiceData($data);
}
