<?php

namespace App\Services\TempParcelSender;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\TempParcelSender\TempParcelSenderRepository;

class TempParcelSenderServiceImplement extends Service implements TempParcelSenderService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(TempParcelSenderRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getTempParcelSenderDetail($parcelId)
  {
    return $this->mainRepository->getTempParcelSenderDetailByParcelId($parcelId);
  }

  public function storeTempParcelSenderData($data)
  {
    try {
      $validator = Validator::make($data, [
        'parcel_id' => 'bail|required|integer|exists:temp_parcels,id',
        'sender_first_name' => 'bail|required|string|max:255',
        'sender_last_name' => 'bail|required|string|max:255',
        'sender_phone_number' => 'bail|required|phone_number',
        'sender_email' => 'bail|required|string|email|max:255',
        'sender_province_id' => 'bail|required|integer|exists:provinces,id',
        'sender_regency_id' => 'bail|required|integer|exists:regencies,id',
        'sender_district_id' => 'bail|required|integer|exists:districts,id',
        'sender_postal_code' => 'bail|required|string|max:255',
        'sender_full_address' => 'bail|required|string|max:255',
      ], [
        'parcel_id' => [
          'required' => 'ID Temp Parcel wajib diisi.',
          'integer' => 'ID Temp Parcel harus berupa angka.',
          'unique' => 'ID Temp Parcel sudah digunakan.',
        ],
        'sender_first_name' => [
          'required' => 'Nama depan pengirim wajib diisi.',
          'string' => 'Nama depan pengirim harus berupa teks.',
          'max' => 'Nama depan pengirim maksimal 255 karakter.',
        ],
        'sender_last_name' => [
          'required' => 'Nama belakang pengirim wajib diisi.',
          'string' => 'Nama belakang pengirim harus berupa teks.',
          'max' => 'Nama belakang pengirim maksimal 255 karakter.',
        ],
        'sender_phone_number' => [
          'required' => 'Nomor telepon pengirim wajib diisi.',
          'phone_number' => 'Nomor telepon pengirim tidak valid.',
        ],
        'sender_email' => [
          'required' => 'Email pengirim wajib diisi.',
          'string' => 'Email pengirim harus berupa teks.',
          'email' => 'Email pengirim tidak valid.',
          'max' => 'Email pengirim maksimal 255 karakter.',
        ],
        'sender_province_id' => [
          'required' => 'Provinsi pengirim wajib diisi.',
          'integer' => 'Provinsi pengirim harus berupa angka.',
          'exists' => 'Provinsi pengirim tidak ditemukan.',
        ],
        'sender_regency_id' => [
          'required' => 'Kabupaten/Kota pengirim wajib diisi.',
          'integer' => 'Kabupaten/Kota pengirim harus berupa angka.',
          'exists' => 'Kabupaten/Kota pengirim tidak ditemukan.',
        ],
        'sender_district_id' => [
          'required' => 'Kecamatan pengirim wajib diisi.',
          'integer' => 'Kecamatan pengirim harus berupa angka.',
          'exists' => 'Kecamatan pengirim tidak ditemukan.',
        ],
        'sender_postal_code' => [
          'required' => 'Kode Pos pengirim wajib diisi.',
          'string' => 'Kode Pos pengirim harus berupa teks.',
          'max' => 'Kode Pos pengirim maksimal 255 karakter.',
        ],
        'sender_full_address' => [
          'required' => 'Alamat lengkap pengirim wajib diisi.',
          'string' => 'Alamat lengkap pengirim harus berupa teks.',
          'max' => 'Alamat lengkap pengirim maksimal 255 karakter.',
        ],
      ]);

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->storeTempParcelSenderData($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (Exception $e) {
      throw new InvalidArgumentException($e->getMessage());
    }
  }

  public function updateTempParcelSenderData($parcelId, $data)
  {
    $validator = Validator::make($data, [
      'sender_first_name' => 'bail|nullable|string|max:255',
      'sender_last_name' => 'bail|nullable|string|max:255',
      'sender_phone_number' => 'bail|nullable|phone_number',
      'sender_email' => 'bail|nullable|string|email|max:255',
      'sender_province_id' => 'bail|nullable|integer|exists:provinces,id',
      'sender_regency_id' => 'bail|nullable|integer|exists:regencies,id',
      'sender_district_id' => 'bail|nullable|integer|exists:districts,id',
      'sender_postal_code' => 'bail|nullable|string|max:255',
      'sender_full_address' => 'bail|nullable|string|max:255',
    ], [
      'sender_first_name' => [
        'string' => 'Nama depan pengirim harus berupa teks.',
        'max' => 'Nama depan pengirim maksimal 255 karakter.',
      ],
      'sender_last_name' => [
        'string' => 'Nama belakang pengirim harus berupa teks.',
        'max' => 'Nama belakang pengirim maksimal 255 karakter.',
      ],
      'sender_phone_number' => [
        'phone_number' => 'Nomor telepon pengirim tidak valid.',
      ],
      'sender_email' => [
        'string' => 'Email pengirim harus berupa teks.',
        'email' => 'Email pengirim tidak valid.',
        'max' => 'Email pengirim maksimal 255 karakter.',
      ],
      'sender_province_id' => [
        'integer' => 'Provinsi pengirim harus berupa angka.',
        'exists' => 'Provinsi pengirim tidak ditemukan.',
      ],
      'sender_regency_id' => [
        'integer' => 'Kabupaten/Kota pengirim harus berupa angka.',
        'exists' => 'Kabupaten/Kota pengirim tidak ditemukan.',
      ],
      'sender_district_id' => [
        'integer' => 'Kecamatan pengirim harus berupa angka.',
        'exists' => 'Kecamatan pengirim tidak ditemukan.',
      ],
      'sender_postal_code' => [
        'string' => 'Kode Pos pengirim harus berupa teks.',
        'max' => 'Kode Pos pengirim maksimal 255 karakter.',
      ],
      'sender_full_address' => [
        'string' => 'Alamat lengkap pengirim harus berupa teks.',
        'max' => 'Alamat lengkap pengirim maksimal 255 karakter.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $dataParcelSender = $this->mainRepository->getTempParcelSenderDetailByParcelId($parcelId);
      $result = $this->mainRepository->update($dataParcelSender->id, $data);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();

    return $result;
  }

  public function deleteTempParcelSenderData($parcelId)
  {
    DB::beginTransaction();

    try {
      $dataParcelSender = $this->mainRepository->getTempParcelSenderDetailByParcelId($parcelId);
      $result = $this->mainRepository->delete($dataParcelSender->id);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();
    return $result;
  }
}
