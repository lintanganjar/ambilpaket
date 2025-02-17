<?php

namespace App\Repositories\Rate;

use LaravelEasyRepository\Repository;

interface RateRepository extends Repository{
    public function getAllRate();
    public function showRatingById($id);
    public function showRatingByParcelId($parcelId);
    public function rating($data);
}
