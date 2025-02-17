<?php

namespace App\Repositories\TopUpTransactions;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\TopUpTransactions;

class TopUpTransactionsRepositoryImplement extends Eloquent implements TopUpTransactionsRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(TopUpTransactions $model)
    {
        $this->model = $model;
    }

    public function getTopupHistoryWithSearch($request)
    {
        $query = $this->model
            ->with(['agen', 'paymentMethod']) 
            ->orderBy('created_at', 'desc'); 

        if ($request->agen_id) {
            $query->where('agen_id', $request->agen_id);
        }

        if ($request->amount_min && $request->amount_max) {
            $query->whereBetween('amount', [$request->amount_min, $request->amount_max]);
        }

        if ($request->payment_method_id) {
            $query->where('payment_method_id', $request->payment_method_id);
        }

        if ($request->request_status) {
            $query->where('request_status', $request->request_status);
        }

        return $query->get();
    }

    public function getDetailTopUpTransaction($id)
    {
        return $this->model
            ->with(['agen', 'paymentMethod']) 
            ->find($id);
    }

    public function storeTopUpTransactionData($dataRequest)
    {
        $transaction = new $this->model;

        $transaction->agen_id = $dataRequest['agen_id'];
        $transaction->amount = $dataRequest['amount'];
        $transaction->payment_method_id = $dataRequest['payment_method_id'];
        $transaction->request_status = $dataRequest['request_status'] ?? 'Pending';

        $transaction->save();

        return $transaction;
    }
    
    public function topUpSaldo($request)
    {
        $query = $this->model::query()->where('request_status','Pending');

        // Apply search filters
        if ($request->filled('agen_id')) {
            $query->where('agen_id', $request->input('agen_id'));
        }
        
        return $query->get();
    }

    public function topUpSaldoHistory($request)
    {
        $query = $this->model::query()->where('request_status','Sukses')->orWhere('request_status','Ditolak');

        // Apply search filters
        if ($request->filled('agen_id')) {
            $query->where('agen_id', $request->input('agen_id'));
        }
        
        return $query->get();
    }

}
