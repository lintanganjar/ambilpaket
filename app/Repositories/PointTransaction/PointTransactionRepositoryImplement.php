<?php

namespace App\Repositories\PointTransaction;

use App\Models\User;
use App\Models\PointTransaction;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class PointTransactionRepositoryImplement extends Eloquent implements PointTransactionRepository
{
    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(PointTransaction $model)
    {
        $this->model = $model;
    }

    public function getAllPointTransactionWithSearch($request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $transactionType = $request->input('transaction_type');
        $amount = $request->input('amount');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = $this->model->newQuery();

        if ($transactionType) {
            $query->where('transaction_type', $transactionType);
        }

        if ($amount) {
            $query->where('amount', 'like', "%$amount%");
        }

        if ($startDate || $endDate) {
            $start = $startDate . ' 00:00:00';
            $end = $endDate . ' 23:59:59';
            $query->whereBetween('created_at', [$start, $end]);
        }

        return $query->with(['user'])
            ->where('user_id',  $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getPointTransactionDetail($id)
    {
        return $this->model->where('id', $id)->with('user')->first();
    }

    public function storePointTransactionData($data)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pointTransactions = new $this->model;

        $pointTransactions->user_id = $user->id;
        $pointTransactions->transaction_type = $data['transaction_type'];
        $pointTransactions->amount = $data['amount'];

        $pointTransactions->save();

        $pointTransactions->load('user');

        return $pointTransactions;
    }
}
