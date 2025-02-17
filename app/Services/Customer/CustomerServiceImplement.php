<?php

namespace App\Services\Customer;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Customer\CustomerRepository;

class CustomerServiceImplement extends Service implements CustomerService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(CustomerRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getAllCustomerWithSearch($request)
  {
    return $this->mainRepository->getAllCustomerWithSearch($request);
  }
  public function getCustomersInSameArea($adminHubArea)
  {
    // Anda bisa menyesuaikan query sesuai dengan kebutuhan area yang ingin dicari
    return $this->mainRepository->getCustomersByArea($adminHubArea);
  }

  public function getCustomerDetail($id)
  {
    return $this->mainRepository->getCustomerDetail($id);
  }
  public function storeCustomerData($dataCustomer)
  {
    $validator = Validator::make($dataCustomer, [
      'first_name' => 'bail|required|string|max:255',
      'last_name' => 'bail|required|string|max:255',
      'phone_number' => 'phone_number',
      'full_address' => 'nullable|string|max:255',
      'profile_img' => 'nullable|string|max:255',
    ], [
      'first_name' => [
        'required' => 'Nama depan wajib diisi.',
        'string' => 'Nama depan harus berupa teks.',
        'max' => 'Nama depan maksimal 255 karakter.',
      ],
      'last_name' => [
        'required' => 'Nama belakang wajib diisi.',
        'string' => 'Nama belakang harus berupa teks.',
        'max' => 'Nama belakang maksimal 255 karakter.',
      ],
      'phone_number' => [
        'phone_number' => 'Nomor telepon tidak valid.',
      ],
      'full_address' => [
        'string' => 'Alamat lengkap harus berupa teks.',
        'max' => 'Alamat lengkap maksimal 255 karakter.',
      ],
      'profile_img' => [
        'string' => 'URL profil harus berupa teks.',
        'max' => 'URL profil maksimal 255 karakter.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $result = $this->mainRepository->storeCustomerData($dataCustomer);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException('Unable to Store Data');
    }

    DB::commit();

    return $result;
  }
  public function updateCustomerData($id, $data)
  {
    $validator = Validator::make($data, [
      'first_name' => 'bail|nullable|string|max:255',
      'last_name' => 'bail|nullable|string|max:255',
      'phone_number' => 'bail|nullable|phone_number',
      'province_id' => 'bail|nullable|integer|exists:provinces,id',
      'regency_id' => 'bail|nullable|integer|exists:regencies,id',
      'district_id' => 'bail|nullable|integer|exists:districts,id',
      'postal_code' => 'bail|nullable|string|max:6',
      'full_address' => 'bail|nullable|string|max:255',
      'point' => 'bail|nullable|integer',
      'profile_img' => 'bail|nullable|string|max:255',
    ], [
      'first_name' => [
        'string' => 'Nama depan harus berupa teks.',
        'max' => 'Nama depan maksimal 255 karakter.',
      ],
      'last_name' => [
        'string' => 'Nama belakang harus berupa teks.',
        'max' => 'Nama belakang maksimal 255 karakter.',
      ],
      'phone_number' => [
        'phone_number' => 'Nomor telepon tidak valid.',
      ],
      'province_id' => [
        'integer' => 'Provinsi harus berupa angka.',
        'exists' => 'Provinsi tidak ditemukan.',
      ],
      'regency_id' => [
        'integer' => 'Kabupaten/Kota harus berupa angka.',
        'exists' => 'Kabupaten/Kota tidak ditemukan.',
      ],
      'district_id' => [
        'integer' => 'Kecamatan harus berupa angka.',
        'exists' => 'Kecamatan tidak ditemukan.',
      ],
      'postal_code' => [
        'string' => 'Kode pos harus berupa teks.',
        'max' => 'Kode pos maksimal 6 karakter.',
      ],
      'full_address' => [
        'string' => 'Alamat lengkap harus berupa teks.',
        'max' => 'Alamat lengkap maksimal 255 karakter.',
      ],
      'point' => [
        'integer' => 'Poin harus berupa angka.',
      ],
      'profile_img' => [
        'string' => 'URL profil harus berupa teks.',
        'max' => 'URL profil maksimal 255 karakter.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $this->mainRepository->update($id, $data);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();

    return $data;
  }
}
