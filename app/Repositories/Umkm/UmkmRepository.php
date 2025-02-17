<?php

namespace App\Repositories\Umkm;

use LaravelEasyRepository\Repository;

interface UmkmRepository extends Repository{

    public function getAllUmkmWithSearch($request);
    
    public function getDetailUmkm($id);

    public function getUMKMsByArea($adminHubArea);

    public function storeUmkmData($dataUmkm);
}
