<?php

namespace App\Repositories\PartnershipTransaction;

use App\Models\PartnershipTransaction;
use App\Models\PartnershipTransactions;
use LaravelEasyRepository\Implementations\Eloquent;

class PartnershipTransactionRepositoryImplement extends Eloquent implements PartnershipTransactionRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(PartnershipTransactions $model)
    {
        $this->model = $model;
    }

    public function getHistoryWithSearch($request)
    {
        $query = $this->model
            ->with(['agen', 'fromPartnership', 'intoPartnership', 'paymentMethod'])
            ->orderBy('created_at', 'desc');

        if ($request->agen_id) {
            $query->where('agen_id', $request->agen_id);
        }

        if ($request->amount_min && $request->amount_max) {
            $query->whereBetween('amount', [$request->amount_min, $request->amount_max]);
        }

        if ($request->from_partnership_id) {
            $query->where('from_partnership_id', $request->from_partnership_id);
        }

        if ($request->into_partnership_id) {
            $query->where('into_partnership_id', $request->into_partnership_id);
        }

        if ($request->payment_method_id) {
            $query->where('payment_method_id', $request->payment_method_id);
        }

        if ($request->request_status) {
            $query->where('request_status', $request->request_status);
        }

        return $query->get();
    }

    public function getDetailPartnershipTransaction($id)
    {
        return $this->model
            ->with(['agen', 'fromPartnership', 'intoPartnership', 'paymentMethod'])
            ->find($id);
    }

    public function storePartnershipTransactionData($dataRequest)
    {
        $transaction = new $this->model;

        $transaction->agen_id = $dataRequest['agen_id'];
        $transaction->amount = $dataRequest['amount'];
        $transaction->from_partnership_id = $dataRequest['from_partnership_id'] ?? null;
        $transaction->into_partnership_id = $dataRequest['into_partnership_id'];
        $transaction->payment_method_id = $dataRequest['payment_method_id'];
        $transaction->request_status = $dataRequest['request_status'] ?? 'Pending';

        $transaction->save();

        return $transaction;
    }
}