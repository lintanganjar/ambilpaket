<?php

namespace App\Repositories\CourierCommission;

use App\Models\User;
use GuzzleHttp\Psr7\Request;
use App\Models\CourierWithdrawal;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class CourierCommissionRepositoryImplement extends Eloquent implements CourierCommissionRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(CourierWithdrawal $model)
    {
        $this->model = $model;
    }

    public function getCourierCommissionWithSearch($request)
    {
        $user = User::where('id', Auth::user()->id)->with('couriers')->first();
        
        // Mulai query dari tabel courier_withdrawal
        $query = $this->model::query();
        
        $query->where('courier_id', $user->couriers->id);

        // Filter berdasarkan request_status jika ada
        if ($request->has('filter_status') && $request->filter_status) {
            $query->where('request_status', $request->filter_status);
        }

        // Filter berdasarkan pola pencarian pada kolom bank_name
        if ($request->has('bank_name') && $request->bank_name) {
            $query->where('bank_name', 'LIKE', '%' . $request->bank_name . '%');
        }

        // Filter berdasarkan pola pencarian pada kolom account_name
        if ($request->has('account_name') && $request->account_name) {
            $query->where('account_name', 'LIKE', '%' . $request->account_name . '%');
        }

        // Filter berdasarkan rentang tanggal created_at jika ada
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                  ->whereDate('created_at', '<=', $request->end_date);
        } elseif ($request->has('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->has('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Sorting berdasarkan amount atau created_at
        if ($request->has('sort_by') && $request->sort_by === 'amount') {
            $query->orderBy('amount', $request->sort_direction ?? 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Mengembalikan hasil dengan pagination jika ada parameter limit
        if ($request->has('limit')) {
            return $query->paginate($request->limit);
        }

        return $query->get();
    }

    public function storeCourierWithDrawalData($dataCourier)
    {
        $data = new $this->model;
        $data->courier_id = $dataCourier['courier_id'];
        $data->amount = $dataCourier['amount'];
        $data->bank_name = $dataCourier['bank_name'];
        $data->account_name = $dataCourier['account_name'];
        $data->account_number = $dataCourier['account_number'];
        $data->request_status = "Pending";

        $data->save();

        return $data;
    }

    public function courierWithdrawal($request)
    {
        $query = $this->model::query()->where('request_status','Pending');

        if ($request->has('courier_id') && $request->courier_id) {
            $query->where('courier_id', $request->courier_id);
        }
        return $query->get();
    }
    
    public function courierWithdrawalHistory($request)
    {
        $query = $this->model::query()->where('request_status','Sukses')->orWhere('request_status','Ditolak');
        
        if ($request->has('courier_id') && $request->courier_id) {
            $query->where('courier_id', $request->courier_id);
        }
        return $query->get();
    }
}
