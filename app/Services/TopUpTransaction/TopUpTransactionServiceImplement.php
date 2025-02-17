<?php

namespace App\Services\TopUpTransaction;

use LaravelEasyRepository\Service;
use App\Repositories\TopUpTransactions\TopUpTransactionsRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class TopUpTransactionServiceImplement extends Service implements TopUpTransactionService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TopUpTransactionsRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getTopupHistoryWithSearch($request)
    {
        try {
            return $this->mainRepository->getTopupHistoryWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getDetailTopUpTransaction($id)
    {
        try {
            return $this->mainRepository->getDetailTopUpTransaction($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function storeTopUpTransactionData($dataRequest)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataRequest, [
                'agen_id' => 'required|exists:agens,id',
                'amount' => 'required|integer|min:1',
                'payment_method_id' => 'required|exists:payment_methods,id',
                'request_status' => 'nullable|in:Sukses,Pending,Ditolak',
            ], [
                'agen_id.required' => 'Agen ID wajib diisi.',
                'agen_id.exists' => 'Agen ID tidak valid.',
                'amount.required' => 'Jumlah transaksi wajib diisi.',
                'amount.integer' => 'Jumlah transaksi harus berupa angka bulat.',
                'amount.min' => 'Jumlah transaksi minimal 1.',
                'payment_method_id.required' => 'Metode pembayaran wajib diisi.',
                'payment_method_id.exists' => 'Metode pembayaran tidak valid.',
                'request_status.in' => 'Status transaksi tidak valid.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storeTopUpTransactionData($dataRequest);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function topUpSaldo($request)
    {
      return $this->mainRepository->topUpSaldo($request);
    }
    
    public function topUpSaldoHistory($request)
    {
      return $this->mainRepository->topUpSaldoHistory($request);
    }

    public function acceptTopUpSaldo($id)
    {
      $data = [
        'request_status' => 'Sukses',
      ];
      return $this->mainRepository->update($id,$data);
    }

    public function declineTopUpSaldo($id)
    {
      $data = [
        'request_status' => 'Ditolak',
      ];
      return $this->mainRepository->update($id,$data);
    }
}
