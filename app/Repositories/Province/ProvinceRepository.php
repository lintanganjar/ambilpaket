<?php

namespace App\Repositories\Province;

use LaravelEasyRepository\Repository;

interface ProvinceRepository extends Repository{

    public function getAllProvinceWithSearch($request);
}
