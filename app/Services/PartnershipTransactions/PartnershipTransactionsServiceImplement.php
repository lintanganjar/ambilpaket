<?php

namespace App\Services\PartnershipTransactions;

use App\Repositories\PartnershipTransaction\PartnershipTransactionRepository;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class PartnershipTransactionsServiceImplement extends Service implements PartnershipTransactionsService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PartnershipTransactionRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getHistoryWithSearch($request)
    {
        try {
            return $this->mainRepository->getHistoryWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getDetailPartnershipTransaction($id)
    {
        try {
            return $this->mainRepository->getDetailPartnershipTransaction($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function storePartnershipTransactionData($dataRequest)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataRequest, [
                'agen_id' => 'required|exists:agens,id',
                'amount' => 'required|numeric|min:1',
                'from_partnership_id' => 'nullable|exists:partnerships,id',
                'into_partnership_id' => 'required|exists:partnerships,id',
                'payment_method_id' => 'required|exists:payment_methods,id',
                'request_status' => 'nullable|in:Pending,Approved,Rejected',
            ], [
                'agen_id.required' => 'Agen ID wajib diisi.',
                'agen_id.exists' => 'Agen ID tidak valid.',
                'amount.required' => 'Jumlah transaksi wajib diisi.',
                'amount.numeric' => 'Jumlah transaksi harus berupa angka.',
                'amount.min' => 'Jumlah transaksi minimal 1.',
                'from_partnership_id.exists' => 'Partnership asal tidak valid.',
                'into_partnership_id.required' => 'Partnership tujuan wajib diisi.',
                'into_partnership_id.exists' => 'Partnership tujuan tidak valid.',
                'payment_method_id.required' => 'Metode pembayaran wajib diisi.',
                'payment_method_id.exists' => 'Metode pembayaran tidak valid.',
                'request_status.in' => 'Status transaksi tidak valid.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storePartnershipTransactionData($dataRequest);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
