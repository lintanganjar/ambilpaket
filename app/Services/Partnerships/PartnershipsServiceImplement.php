<?php

namespace App\Services\Partnerships;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Partnerships\PartnershipsRepository;

class PartnershipsServiceImplement extends ServiceApi implements PartnershipsService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected PartnershipsRepository $mainRepository;

    public function __construct(PartnershipsRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllpartnerships(){
      return $this->mainRepository->getAll();
    }
}
