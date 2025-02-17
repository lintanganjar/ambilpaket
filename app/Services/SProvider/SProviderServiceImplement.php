<?php

namespace App\Services\SProvider;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ServiceProvider\ServiceProviderRepository;

class SProviderServiceImplement extends Service implements SProviderService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ServiceProviderRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllWithSearch($request)
    {
      return $this->mainRepository->getAllWithSearch($request);
    }

    public function storeServiceData($data)
    {
      $validator = Validator::make($data, [
        'provider_name' => 'bail|required|string|max:255',
        'courier_code' => 'bail|required|string|max:255',
        'logo' => 'bail|required|string|max:255',
      ], [
        'provider_name' => [
            'required' => 'Nama kurir wajib diisi.',
            'string' => 'Nama kurir harus berupa teks.',
            'max' => 'Nama kurir maksimal 255 karakter.',
        ],
        'courier_code' => [
            'required' => 'Kode kurir wajib diisi.',
            'string' => 'Kode kurir harus berupa teks.',
            'max' => 'Kode kurir maksimal 255 karakter.',
        ],
        'logo' => [
            'required' => 'Logo kurir wajib diisi.',
            'string' => 'Logo kurir harus berupa teks.',
            'max' => 'Logo kurir maksimal 255 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->storeServiceData($data);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Store Data');
      }

      DB::commit();

      return $result;
    }

    public function updateData($id,$data)
    {
      $validator = Validator::make($data, [
        'name' => 'bail|required|string|max:255',
        'courier_code' => 'bail|required|string|max:255',
        'logo' => 'bail|required|string|max:255',
      ], [
        'name' => [
            'required' => 'Nama kurir wajib diisi.',
            'string' => 'Nama kurir harus berupa teks.',
            'max' => 'Nama kurir maksimal 255 karakter.',
        ],
        'courier_code' => [
            'required' => 'Kode kurir wajib diisi.',
            'string' => 'Kode kurir harus berupa teks.',
            'max' => 'Kode kurir maksimal 255 karakter.',
        ],
        'logo' => [
            'required' => 'Logo kurir wajib diisi.',
            'string' => 'Logo kurir harus berupa teks.',
            'max' => 'Logo kurir maksimal 255 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->update($id,$data);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Update Data');
      }

      DB::commit();
      return $result;
    }

    public function detailService($id)
    {
      return $this->mainRepository->detailService($id);
    }
}
