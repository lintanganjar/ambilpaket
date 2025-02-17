<?php

namespace App\Services\Rate;

use LaravelEasyRepository\BaseService;

interface RateService extends BaseService{
    public function getAllRate();
    public function showRatingById($id);
    public function showRatingByParcelId($parcelId);
    public function rating($data);
    public function updateRating($id, $data);
}
