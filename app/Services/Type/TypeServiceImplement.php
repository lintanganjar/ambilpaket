<?php

namespace App\Services\Type;

use App\Repositories\ServiceType\ServiceTypeRepository;
use LaravelEasyRepository\Service;
use App\Repositories\Type\TypeRepository;

class TypeServiceImplement extends Service implements TypeService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ServiceTypeRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllServiceTypes($request)
    {
      return $this->mainRepository->getAlltypesWithSearch($request);
    }
}
