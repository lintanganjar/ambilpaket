<?php

namespace App\Repositories\Partnerships;

use LaravelEasyRepository\Repository;

interface PartnershipsRepository extends Repository{

    public function getAll();
}
