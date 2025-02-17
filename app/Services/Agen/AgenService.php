<?php

namespace App\Services\Agen;

use LaravelEasyRepository\BaseService;

interface AgenService extends BaseService{

    public function getAllAgenWithSearch($request);

    public function getAgenDetail($id);

    public function getAgenDetailByRegencyId($regencyId);

    public function getTopUpHistory();

    public function storeAgenData($dataAgen);

    public function updateAgenData($id, $data);

    public function updatePartnershipStatus($id, $status);

    public function updateTopUpStatus($id, $status);

    
}
