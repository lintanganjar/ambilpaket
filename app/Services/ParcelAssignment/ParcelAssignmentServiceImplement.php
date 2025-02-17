<?php

namespace App\Services\ParcelAssignment;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ParcelAssignment\ParcelAssignmentRepository;

class ParcelAssignmentServiceImplement extends Service implements ParcelAssignmentService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(ParcelAssignmentRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getAllWithSearch($request)
  {
    return $this->mainRepository->getAllWithSearch($request);
  }

  public function getDetailByResiNumber($resiNumber)
  {
    return $this->mainRepository->getDetailByResiNumber($resiNumber);
  }

  public function findById($id)
  {
    return $this->mainRepository->findById($id);
  }

  public function insertParcelAssignment(array $data)
  {
    try {
      $validator = Validator::make($data, [
        'assignment_date' => 'bail|required|date',
        'kurir_id' => 'bail|required|integer',
        'parcel_id' => 'bail|required|integer',
        'status_reason' => 'nullable|string|max:255',
        'status' => 'nullable|in:Berhasil,Gagal',
      ], [
        'assignment_date' => [
          'required' => 'Tanggal penugasan wajib diisi.',
          'date' => 'Tanggal penugasan tidak valid.',
        ],
        'kurir_id' => [
          'required' => 'ID Kurir wajib diisi.',
          'integer' => 'ID Kurir harus berupa angka.',
        ],
        'parcel_id' => [
          'required' => 'ID Parcel wajib diisi.',
          'integer' => 'ID Parcel harus berupa angka.',
        ],
        'status_reason' => [
          'string' => 'Alasan status harus berupa teks.',
          'max' => 'Alasan status maksimal 255 karakter.',
        ],
        'status' => [
          'in' => 'Status tidak valid.',
        ],
      ]);

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->insertParcelAssignment($data);
    } catch (InvalidArgumentException $e) {
      return response()->json([
        'message' => $e->getMessage()
      ], 400);
    } catch (\Exception $e) {
      return response()->json([
        'message' => 'Something went wrong. Please try again.',
        'error' => $e->getMessage()
      ], 500);
    }
  }


  public function updateParcelAssignment($id, array $data)
  {
    if (empty($id)) {
      throw new InvalidArgumentException('ID tidak boleh kosong');
    }

    $validator = Validator::make($data, [
      'assignment_date' => 'bail|nullable|date',
      'kurir_id' => 'bail|nullable|integer',
      'parcel_id' => 'bail|nullable|integer',
      'status_reason' => 'nullable|string|max:255',
      'status' => 'nullable|in:Berhasil,Gagal',
    ], [
      'assignment_date' => [
        'date' => 'Tanggal penugasan tidak valid.',
      ],
      'kurir_id' => [
        'integer' => 'ID Kurir harus berupa angka.',
      ],
      'parcel_id' => [
        'integer' => 'ID Parcel harus berupa angka.',
      ],
      'status_reason' => [
        'string' => 'Alasan status harus berupa teks.',
        'max' => 'Alasan status maksimal 255 karakter.',
      ],
      'status' => [
        'in' => 'Status tidak valid.',
      ],
    ]);

    if ($validator->fails()) {
      throw new InvalidArgumentException($validator->errors()->first());
    }

    DB::beginTransaction();

    try {
      $result = $this->mainRepository->update($id, $data);

      if (!$result) {
        throw new InvalidArgumentException('Gagal mengupdate data');
      }

      DB::commit();
      return $result;
    } catch (Exception $e) {
      DB::rollBack();
      Log::info($e->getMessage());
      throw new InvalidArgumentException('Gagal mengupdate data: ' . $e->getMessage());
    }
  }

  public function deleteParcelAssignment($id)
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
