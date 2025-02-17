<?php

namespace App\Services\Umkm;

use LaravelEasyRepository\BaseService;

interface UmkmService extends BaseService{

    public function getAllUmkmWithSearch($request);

    public function getUmkmDetail($id);
    
    public function getUMKMsInSameArea($adminHubArea);

    public function storeUmkmData($dataUmkm);

    public function updateUmkmData($id, $data);
}
