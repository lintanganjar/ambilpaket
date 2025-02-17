<?php

namespace App\Services\Price;

use LaravelEasyRepository\Service;
use App\Repositories\ServicePrice\ServicePriceRepository as ServicePriceServicePriceRepository;

class PriceServiceImplement extends Service implements PriceService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ServicePriceServicePriceRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllWithSearch($request){
      return $this->mainRepository->getAllWithSearch($request);
    }

}
