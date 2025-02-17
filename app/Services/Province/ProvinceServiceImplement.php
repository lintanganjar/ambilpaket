<?php

namespace App\Services\Province;

use LaravelEasyRepository\Service;
use App\Repositories\Province\ProvinceRepository;
use Exception;

class ProvinceServiceImplement extends Service implements ProvinceService{

    /**
     * set title message api for CRUD
     * @param string $title
     */
    //  protected string $title = "";
     /**
     * uncomment this to override the default message
     * protected string $create_message = "";
     * protected string $update_message = "";
     * protected string $delete_message = "";
     */

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected ProvinceRepository $mainRepository;

    public function __construct(ProvinceRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllProvinceWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllProvinceWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}