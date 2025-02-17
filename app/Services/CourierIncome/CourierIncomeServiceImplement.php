<?php

namespace App\Services\CourierIncome;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\CourierIncome\CourierIncomeRepository;

class CourierIncomeServiceImplement extends Service implements CourierIncomeService
{
  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(CourierIncomeRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getAllCourierIncomeWithSearch($request)
  {
    return $this->mainRepository->getAllCourierIncomeWithSearch($request);
  }

  public function getCourierIncomeDetail($id)
  {
    return $this->mainRepository->getCourierIncomeDetail($id);
  }

  public function storeCourierIncome($data)
  {
    try {
      $validator = Validator::make($data, [
        'parcel_id' => 'bail|required|integer|exists:parcels,id',
        'income' => 'bail|required|integer',
      ], [
        'parcel_id' => [
          'required' => 'ID Parcel wajib diisi.',
          'integer' => 'ID Parcel harus berupa angka.',
          'exists' => 'Parcel tidak ditemukan.',
        ],
        'income' => [
          'required' => 'Pendapatan wajib diisi.',
          'integer' => 'Pendapatan harus berupa angka.',
        ],
      ]);

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->storeCourierIncome($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (Exception $e) {
      throw new InvalidArgumentException($e->getMessage());
    }
  }

  public function updateCourierIncome($id, $data)
  {
    $validator = Validator::make($data, [
      'income' => 'bail|nullable|integer',
    ], [
      'income' => [
        'integer' => 'Pendapatan harus berupa angka.',
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

  public function deleteCourierIncome($id)
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
