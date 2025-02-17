<?php

namespace App\Services\Regency;

use Exception;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Regency\RegencyRepository;

class RegencyServiceImplement extends Service implements RegencyService{

    /**
     * set title message api for CRUD
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
     protected RegencyRepository $mainRepository;

    public function __construct(RegencyRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllRegencyWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllRegencyWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}