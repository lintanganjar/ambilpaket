<?php

namespace App\Repositories\Agen;

use LaravelEasyRepository\Repository;

interface AgenRepository extends Repository{

    public function getAllAgenWithSearch($request);
    
    public function getDetailAgen($id);
    
    public function getDetailAgenByRegencyId($regencyId);

    public function getTopUpHistory();

    public function getAgentById($agenId);

    public function storeAgenData($dataAgen);

    public function updatePartnershipStatus($id, $status);

    public function updateTopUpStatus($id, $status);



}
