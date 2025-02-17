<?php

namespace App\Services\District;

use Exception;
use LaravelEasyRepository\Service;
use App\Repositories\District\DistrictRepository;

class DistrictServiceImplement extends Service implements DistrictService{

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
     protected DistrictRepository $mainRepository;

    public function __construct(DistrictRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllDistrictWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllDistrictWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}