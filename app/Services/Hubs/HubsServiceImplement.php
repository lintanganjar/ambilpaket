<?php

namespace App\Services\Hubs;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use App\Repositories\Hubs\HubsRepository;
use Illuminate\Support\Facades\Validator;

class HubsServiceImplement extends Service implements HubsService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(HubsRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllHubWithSearch($request)
    {
      return $this->mainRepository->getAllHubWithSearch($request);
    }

    public function getHubDetail($id)
    {
      return $this->mainRepository->getHubDetail($id);
    }

    public function storeHubData($data)
    {
      $validator = Validator::make($data, [
        'area_id' => 'bail|required|integer',
        'name' => 'bail|required|string|max:255',
        'province_id' => 'bail|required|integer',
        'regency_id' => 'bail|required|integer',
        'district_id' => 'bail|required|integer',
        'full_address' => 'bail|required|string|max:255',
        'latitude' => 'bail|required|string|max:20',
        'longitude' => 'bail|required|string|max:20',
      ], [
        'area_id' => [
            'required' => 'ID Area wajib diisi.',
            'integer' => 'ID Area harus berupa angka.',
        ],
        'name' => [
            'required' => 'Nama Area wajib diisi.',
            'string' => 'Nama Area harus berupa teks.',
            'max' => 'Nama Area maksimal 255 karakter.',
        ],
        'province_id' => [
            'required' => 'Provinsi wajib dipilih.',
            'integer' => 'Provinsi harus berupa angka.',
        ],
        'regency_id' => [
            'required' => 'Kabupaten/Kota wajib dipilih.',
            'integer' => 'Kabupaten/Kota harus berupa angka.',
        ],
        'district_id' => [
            'required' => 'Kecamatan wajib dipilih.',
            'integer' => 'Kecamatan harus berupa angka.',
        ],
        'full_address' => [
            'required' => 'Alamat lengkap wajib diisi.',
            'string' => 'Alamat lengkap harus berupa teks.',
            'max' => 'Alamat lengkap maksimal 255 karakter.',
        ],
        'latitude' => [
            'required' => 'Latitude wajib diisi.',
            'string' => 'Latitude harus berupa teks.',
            'max' => 'Latitude maksimal 20 karakter.',
        ],
        'longitude' => [
            'required' => 'Longitude wajib diisi.',
            'string' => 'Longitude harus berupa teks.',
            'max' => 'Longitude maksimal 20 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }
      DB::beginTransaction();

      try {
        $result = $this->mainRepository->create($data);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Store Data');
      }

      DB::commit();

      return $result;
    }

    public function updateHubData($id,$data)
    {
        $validator = Validator::make($data, [
          'area_id' => 'bail|required|integer',
          'name' => 'bail|required|string|max:255',
          'province_id' => 'bail|required|integer',
          'regency_id' => 'bail|required|integer',
          'district_id' => 'bail|required|integer',
          'full_address' => 'bail|required|string|max:255',
          'latitude' => 'bail|required|string|max:20',
          'longitude' => 'bail|required|string|max:20',
      ], [
          'area_id.required' => 'ID Area wajib diisi.',
          'name.required' => 'Nama Area wajib diisi.',
          'province_id.required' => 'Provinsi wajib dipilih.',
          'regency_id.required' => 'Kabupaten/Kota wajib dipilih.',
          'district_id.required' => 'Kecamatan wajib dipilih.',
          'full_address.required' => 'Alamat lengkap wajib diisi.',
          'latitude.required' => 'Latitude wajib diisi.',
          'longitude.required' => 'Longitude wajib diisi.',
      ]);

      if ($validator->fails()) {
          throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
          $this->mainRepository->update($id, $data);

          // Ambil data yang sudah diperbarui
          $updatedData = $this->mainRepository->find($id);

          DB::commit();

          return $updatedData;
      } catch (Exception $e) {
          DB::rollBack();
          Log::info($e->getMessage());

          throw new InvalidArgumentException('Unable to Update Data');
      }
    }
    
    public function deleteHubData($id)
    {
      DB::beginTransaction();

      try {
        $result = $this->mainRepository->delete($id);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Delete Data');
      }

      DB::commit();
      return $result;
    }
}
