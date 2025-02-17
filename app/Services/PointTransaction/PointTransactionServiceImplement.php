<?php

namespace App\Services\PointTransaction;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\PointTransaction\PointTransactionRepository;

class PointTransactionServiceImplement extends Service implements PointTransactionService
{

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $mainRepository;

  public function __construct(PointTransactionRepository $mainRepository)
  {
    $this->mainRepository = $mainRepository;
  }

  public function getAllPointTransactionWithSearch($request)
  {
    return $this->mainRepository->getAllPointTransactionWithSearch($request);
  }

  public function getPointTransactionDetail($id)
  {
    return $this->mainRepository->getPointTransactionDetail($id);
  }

  public function storePointTransactionData($data)
  {
    try {
      $validator = Validator::make($data, [
        'transaction_type' => 'bail|required|in:earn,redeem',
        'amount' => 'bail|required|integer',
      ], [
        'transaction_type' => [
          'required' => 'Tipe transaksi wajib dipilih.',
          'in' => 'Tipe transaksi tidak valid.',
        ],
        'amount' => [
          'required' => 'Jumlah transaksi wajib diisi.',
          'integer' => 'Jumlah transaksi harus berupa angka.',
        ],
      ]);

      if ($validator->fails()) {
        throw new InvalidArgumentException($validator->errors()->first());
      }

      return $this->mainRepository->storePointTransactionData($data);
    } catch (InvalidArgumentException $e) {
      throw new InvalidArgumentException($e->getMessage());
    } catch (Exception $e) {
      throw new InvalidArgumentException($e->getMessage());
    }
  }

  public function updatePointTransactionData($id, $data)
  {
    $validator = Validator::make($data, [
      'transaction_type' => 'bail|nullable|in:earn,redeem',
      'amount' => 'bail|nullable|integer',
    ], [
      'transaction_type' => [
        'in' => 'Tipe transaksi tidak valid.',
      ],
      'amount' => [
        'integer' => 'Jumlah transaksi harus berupa angka.',
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

  public function deletePointTransactionData($id)
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
