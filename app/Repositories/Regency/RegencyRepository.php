<?php

namespace App\Repositories\Regency;

use LaravelEasyRepository\Repository;

interface RegencyRepository extends Repository{

    public function getAllRegencyWithSearch($request);
}
