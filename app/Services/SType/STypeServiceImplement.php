<?php

namespace App\Services\SType;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ServiceType\ServiceTypeRepository;

class STypeServiceImplement extends Service implements STypeService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(ServiceTypeRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function storeServiceData($data)
    {
      $validator = Validator::make($data, [
        'service_provider_id' => 'bail|required|integer',
        'type_name' => 'bail|required|string|max:255',
        'note' => 'string|max:255',
      ], [
        'service_provider_id' => [
            'required' => 'ID Penyedia Jasa wajib diisi.',
            'integer' => 'ID Penyedia Jasa harus berupa angka.',
        ],
        'type_name' => [
            'required' => 'Nama Jasa wajib diisi.',
            'string' => 'Nama Jasa harus berupa teks.',
            'max' => 'Nama Jasa maksimal 255 karakter.',
        ],
        'note' => [
            'string' => 'Catatan harus berupa teks.',
            'max' => 'Catatan maksimal 255 karakter.',
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
        'service_provider_id' => 'bail|required|integer',
        'name' => 'bail|required|string|max:255',
        'note' => 'string|max:255',
      ], [
        'service_provider_id' => [
            'required' => 'ID Penyedia Jasa wajib diisi.',
            'integer' => 'ID Penyedia Jasa harus berupa angka.',
        ],
        'name' => [
            'required' => 'Nama Jasa wajib diisi.',
            'string' => 'Nama Jasa harus berupa teks.',
            'max' => 'Nama Jasa maksimal 255 karakter.',
        ],
        'note' => [
            'string' => 'Catatan harus berupa teks.',
            'max' => 'Catatan maksimal 255 karakter.',
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
}
