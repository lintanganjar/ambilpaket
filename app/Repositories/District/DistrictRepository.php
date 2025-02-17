<?php

namespace App\Repositories\District;

use LaravelEasyRepository\Repository;

interface DistrictRepository extends Repository{

    // Write something awesome :)
    public function getAllDistrictWithSearch($request);

}
