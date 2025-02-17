<?php

namespace App\Services\Ongkir;

use LaravelEasyRepository\BaseService;

interface OngkirService extends BaseService{

    public function cekOngkir($data);
}
