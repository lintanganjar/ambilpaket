<?php

namespace App\Services\TempParcelReceiver;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\TempParcelReceiver\TempParcelReceiverRepository;

class TempParcelReceiverServiceImplement extends Service implements TempParcelReceiverService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(TempParcelReceiverRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getTempParcelReceiverDetail($parcelId)
  {
    return $this->mainRepository->getTempParcelReceiverDetailByParcelId($parcelId);
  }

  public function storeTempParcelReceiverData($data)
  {
    try {
      $validator = Validator::make($data, [
        'parcel_id' => 'bail|required|integer|exists:temp_parcels,id',
        'reciever_first_name' => 'bail|required|string|max:255',
        'reciever_last_name' => 'bail|required|string|max:255',
        'reciever_phone_number' => 'bail|required|phone_number',
        'reciever_email' => 'bail|required|string|email|max:255',
        'reciever_province_id' => 'bail|required|integer|exists:provinces,id',
        'reciever_regency_id' => 'bail|required|integer|exists:regencies,id',
        'reciever_district_id' => 'bail|required|integer|exists:districts,id',
        'reciever_postal_code' => 'bail|required|string|max:255',
        'reciever_full_address' => 'bail|required|string|max:255',
        'reciever_latitude' => 'nullable|string|max:255',
        'reciever_longitude' => 'nullable|string|max:255',
      ], [
        'parcel_id' => [
          'required' => 'ID Temp Parcel wajib diisi.',
          'integer' => 'ID Temp Parcel harus berupa angka.',
          'unique' => 'ID Temp Parcel sudah digunakan.',
        ],
        'reciever_first_name' => [
          'required' => 'Nama depan pengirim wajib diisi.',
          'string' => 'Nama depan pengirim harus berupa teks.',
          'max' => 'Nama depan pengirim maksimal 255 karakter.',
        ],
        'reciever_last_name' => [
          'required' => 'Nama belakang pengirim wajib diisi.',
          'string' => 'Nama belakang pengirim harus berupa teks.',
          'max' => 'Nama belakang pengirim maksimal 255 karakter.',
        ],
        'reciever_phone_number' => [
          'required' => 'Nomor telepon pengirim wajib diisi.',
          'phone_number' => 'Nomor telepon pengirim tidak valid.',
        ],
        'reciever_email' => [
          'required' => 'Email pengirim wajib diisi.',
          'string' => 'Email pengirim harus berupa teks.',
          'email' => 'Email pengirim tidak valid.',
          'max' => 'Email pengirim maksimal 255 karakter.',
        ],
        'reciever_province_id' => [
          'required' => 'Provinsi pengirim wajib diisi.',
          'integer' => 'Provinsi pengirim harus berupa angka.',
          'exists' => 'Provinsi pengirim tidak ditemukan.',
        ],
        'reciever_regency_id' => [
          'required' => 'Kabupaten/Kota pengirim wajib diisi.',
          'integer' => 'Kabupaten/Kota pengirim harus berupa angka.',
          'exists' => 'Kabupaten/Kota pengirim tidak ditemukan.',
        ],
        'reciever_district_id' => [
          'required' => 'Kecamatan pengirim wajib diisi.',
          'integer' => 'Kecamatan pengirim harus berupa angka.',
          'exists' => 'Kecamatan pengirim tidak ditemukan.',
        ],
        'reciever_postal_code' => [
          'required' => 'Kode Pos pengirim wajib diisi.',
          'string' => 'Kode Pos pengirim harus berupa teks.',
          'max' => 'Kode Pos pengirim maksimal 255 karakter.',
        ],
        'reciever_full_address' => [
          'required' => 'Alamat lengkap pengirim wajib diisi.',
          'string' => 'Alamat lengkap pengirim harus berupa teks.',
          'max' => 'Alamat lengkap pengirim maksimal 255 karakter.',
        ],
        'reciever_latitude' => [
            'string' => 'Latitude harus berupa teks.',
            'max' => 'Latitude maksimal 255 karakter.',
        ],
        'reciever_longitude' => [
            'string' => 'Longitude harus berupa teks.',
            'max' => 'Longitude maksimal 255 karakter.',
        ],
      ]);

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->storeTempParcelReceiverData($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (Exception $e) {
      throw new InvalidArgumentException($e->getMessage());
    }
  }

  public function updateTempParcelReceiverData($parcelId, $data)
  {
    $validator = Validator::make($data, [
      'reciever_first_name' => 'bail|nullable|string|max:255',
      'reciever_last_name' => 'bail|nullable|string|max:255',
      'reciever_phone_number' => 'bail|nullable|phone_number',
      'reciever_email' => 'bail|nullable|string|email|max:255',
      'reciever_province_id' => 'bail|nullable|integer|exists:provinces,id',
      'reciever_regency_id' => 'bail|nullable|integer|exists:regencies,id',
      'reciever_district_id' => 'bail|nullable|integer|exists:districts,id',
      'reciever_postal_code' => 'bail|nullable|string|max:255',
      'reciever_full_address' => 'bail|nullable|string|max:255',
      'reciever_latitude' => 'nullable|string|max:255',
      'reciever_longitude' => 'nullable|string|max:255',
    ], [
      'reciever_first_name' => [
        'string' => 'Nama depan penerima harus berupa teks.',
        'max' => 'Nama depan penerima maksimal 255 karakter.',
      ],
      'reciever_last_name' => [
        'string' => 'Nama belakang penerima harus berupa teks.',
        'max' => 'Nama belakang penerima maksimal 255 karakter.',
      ],
      'reciever_phone_number' => [
        'phone_number' => 'Nomor telepon penerima tidak valid.',
      ],
      'reciever_email' => [
        'string' => 'Email penerima harus berupa teks.',
        'email' => 'Email penerima tidak valid.',
        'max' => 'Email penerima maksimal 255 karakter.',
      ],
      'reciever_province_id' => [
        'integer' => 'Provinsi penerima harus berupa angka.',
        'exists' => 'Provinsi penerima tidak ditemukan.',
      ],
      'reciever_regency_id' => [
        'integer' => 'Kabupaten/Kota penerima harus berupa angka.',
        'exists' => 'Kabupaten/Kota penerima tidak ditemukan.',
      ],
      'reciever_district_id' => [
        'integer' => 'Kecamatan penerima harus berupa angka.',
        'exists' => 'Kecamatan penerima tidak ditemukan.',
      ],
      'reciever_postal_code' => [
        'string' => 'Kode Pos penerima harus berupa teks.',
        'max' => 'Kode Pos penerima maksimal 255 karakter.',
      ],
      'reciever_full_address' => [
        'string' => 'Alamat lengkap penerima harus berupa teks.',
        'max' => 'Alamat lengkap penerima maksimal 255 karakter.',
      ],
      'reciever_latitude' => [
          'string' => 'Latitude harus berupa teks.',
          'max' => 'Latitude maksimal 255 karakter.',
      ],
      'reciever_longitude' => [
          'string' => 'Longitude harus berupa teks.',
          'max' => 'Longitude maksimal 255 karakter.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $dataParcelReceiver = $this->mainRepository->getTempParcelReceiverDetailByParcelId($parcelId);
      $result = $this->mainRepository->update($dataParcelReceiver->id, $data);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();

    return $result;
  }

  public function deleteTempParcelReceiverData($parcelId)
  {
    DB::beginTransaction();

    try {
      $dataParcelReceiver = $this->mainRepository->getTempParcelReceiverDetailByParcelId($parcelId);
      $result = $this->mainRepository->delete($dataParcelReceiver->id);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();
    return $result;
  }
}
