<?php

namespace App\Services\TempParcel;

use Exception;
use App\utils\ResiNumber;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\TempParcel\TempParcelRepository;

class TempParcelServiceImplement extends Service implements TempParcelService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(TempParcelRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getAllTempParcelWithSearch($request)
  {
    return $this->mainRepository->getAllTempParcelWithSearch($request);
  }

  public function getTempParcelDetail($id)
  {
    return $this->mainRepository->getTempParcelDetail($id);
  }

  public function storeTempParcelData($data)
  {
    try {
      $validator = Validator::make($data, [
        'price' => 'bail|required|integer',
        'item_type' => 'bail|required|in:Barang,Dokumen',
        'item_name' => 'bail|required|string|max:255',
        'amount' => 'bail|required|integer',
        'weight' => 'bail|required|string|max:20',
        'item_height' => 'nullable|string|max:20',
        'item_width' => 'nullable|string|max:20',
        'item_length' => 'nullable|string|max:20',
        'note' => 'bail|nullable|string|max:255',
        'service_price_id' => 'bail|required|integer|exists:services_prices,id',
        'estimation_date' => 'bail|required|string|max:255',
      ], [
        'price' => [
          'required' => 'Harga wajib diisi.',
          'integer' => 'Harga harus berupa angka.',
        ],
        'item_type' => [
          'required' => 'Tipe item wajib dipilih.',
          'in' => 'Tipe item tidak valid.',
        ],
        'item_name' => [
          'required' => 'Nama item wajib diisi.',
          'string' => 'Nama item harus berupa teks.',
          'max' => 'Nama item maksimal 255 karakter.',
        ],
        'amount' => [
          'required' => 'Jumlah item wajib diisi.',
          'integer' => 'Jumlah item harus berupa angka.',
        ],
        'weight' => [
          'required' => 'Berat item wajib diisi.',
          'string' => 'Berat item harus berupa teks.',
          'max' => 'Berat item maksimal 20 karakter.',
        ],
        'item_height' => [
          'string' => 'Tinggi item harus berupa teks.',
          'max' => 'Tinggi item maksimal 20 karakter.',
        ],
        'item_width' => [
          'string' => 'Lebar item harus berupa teks.',
          'max' => 'Lebar item maksimal 20 karakter.',
        ],
        'item_length' => [
          'string' => 'Panjang item harus berupa teks.',
          'max' => 'Panjang item maksimal 20 karakter.',
        ],
        'note' => [
          'string' => 'Catatan harus berupa teks.',
          'max' => 'Catatan maksimal 255 karakter.',
        ],
        'service_price_id' => [
          'required' => 'ID Harga Jasa wajib diisi.',
          'integer' => 'ID Harga Jasa harus berupa angka.',
          'exists' => 'ID Harga Jasa tidak ditemukan.',
        ],
        'estimation_date' => [
          'required' => 'Tanggal Estimasi wajib diisi.',
          'string' => 'Tanggal Estimasi harus berupa teks.',
          'max' => 'Tanggal Estimasi maksimal 255 karakter.',
        ],
      ]);

      $data['temp_resi_number'] = ResiNumber::generateTempResiNumber();

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->storeTempParcelData($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (Exception $e) {
      throw new InvalidArgumentException($e->getMessage());
    }
  }

  public function updateTempParcelData($id, $data)
  {
    $validator = Validator::make($data, [
      'customer_id' => 'nullable|integer|exists:customers,id',
      'customer_umkm_id' => 'nullable|integer|exists:customer_umkms,id',
      'price' => 'bail|nullable|integer',
      'item_type' => 'bail|nullable|in:Barang,Dokumen',
      'item_name' => 'bail|nullable|string|max:255',
      'amount' => 'bail|nullable|integer',
      'weight' => 'bail|nullable|string|max:20',
      'item_height' => 'nullable|string|max:20',
      'item_width' => 'nullable|string|max:20',
      'item_length' => 'nullable|string|max:20',
      'note' => 'bail|nullable|string|max:255',
      'service_price_id' => 'bail|nullable|integer|exists:services_prices,id',
      'estimation_date' => 'bail|nullable|string|max:255',
    ], [
      'customer_id' => [
        'integer' => 'ID Pelanggan harus berupa angka.',
        'exists' => 'ID Pelanggan tidak ditemukan.',
      ],
      'customer_umkm_id' => [
        'integer' => 'ID Pelanggan UMKM harus berupa angka.',
        'exists' => 'ID Pelanggan UMKM tidak ditemukan.',
      ],
      'price' => [
        'integer' => 'Harga harus berupa angka.',
      ],
      'item_type' => [
        'in' => 'Tipe item tidak valid.',
      ],
      'item_name' => [
        'string' => 'Nama item harus berupa teks.',
        'max' => 'Nama item maksimal 255 karakter.',
      ],
      'amount' => [
        'integer' => 'Jumlah item harus berupa angka.',
      ],
      'weight' => [
        'string' => 'Berat item harus berupa teks.',
        'max' => 'Berat item maksimal 20 karakter.',
      ],
      'item_height' => [
        'string' => 'Tinggi item harus berupa teks.',
        'max' => 'Tinggi item maksimal 20 karakter.',
      ],
      'item_width' => [
        'string' => 'Lebar item harus berupa teks.',
        'max' => 'Lebar item maksimal 20 karakter.',
      ],
      'item_length' => [
        'string' => 'Panjang item harus berupa teks.',
        'max' => 'Panjang item maksimal 20 karakter.',
      ],
      'note' => [
        'string' => 'Catatan harus berupa teks.',
        'max' => 'Catatan maksimal 255 karakter.',
      ],
      'service_price_id' => [
        'integer' => 'ID Harga Jasa harus berupa angka.',
        'exists' => 'ID Harga Jasa tidak ditemukan.',
      ],
      'estimation_date' => [
        'string' => 'Tanggal Estimasi harus berupa teks.',
        'max' => 'Tanggal Estimasi maksimal 255 karakter.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $result = $this->mainRepository->update($id, $data);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();

    return $result;
  }

  public function deleteTempParcelData($id)
  {
    DB::beginTransaction();

    try {
      $result = $this->mainRepository->delete($id);
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());

      throw new InvalidArgumentException($e->getMessage());
    }

    DB::commit();
    return $result;
  }
}
