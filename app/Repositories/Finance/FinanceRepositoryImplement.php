<?php

namespace App\Repositories\Finance;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Finance;

class FinanceRepositoryImplement extends Eloquent implements FinanceRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Finance $model)
    {
        $this->model = $model;
    }

    public function getAllFinanceWithSearch($request)
    {
        if ($request->email && $request->username && $request->first_name && $request->last_name && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%')
                ->where('username','like', '%' . $request->username . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->email && $request->username && $request->name) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%')
                ->where('username','like', '%' . $request->username . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->email && $request->username && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%')
                ->where('username','like', '%' . $request->username . '%');
            })
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->email && $request->name) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->email && $request->name && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->username && $request->name && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->username && $request->last_name && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->first_name && $request->last_name && $request->phone_number) {
            return $this->model
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->email && $request->username) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%')
                ->where('username','like', '%' . $request->username . '%');
            })
            ->get();
        } elseif ($request->email && $request->name) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->email && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%');
            })
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->username && $request->name) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->username && $request->phone_number) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->first_name && $request->last_name) {
            return $this->model
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->name && $request->phone_number) {
            return $this->model
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } elseif ($request->email) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('email','like', '%' . $request->email . '%');
            })
            ->get();
        } elseif ($request->username) {
            return $this->model->whereHas('user', function($q) use ($request)
            {
                $q->where('username','like', '%' . $request->username . '%');
            })
            ->get();
        } elseif ($request->name) {
            return $this->model
            ->where('first_name', 'like', '%' . $request->name . '%')
            ->orwhere('last_name', 'like', '%' . $request->name . '%')
            ->get();
        } elseif ($request->phone_number) {
            return $this->model
            ->where('phone_number', 'like', '%' . $request->phone_number . '%')
            ->get();
        } else {
            return $this->model->all();
        }
    }

    public function getDetailFinance($id)
    {
        return $this->model->with(['user'])->where('id', $id)->first();
    }

    public function storeFinanceData($dataFinance)
    {
        $finance = new $this->model;
        $finance->user_id = $dataFinance['user_id'];
        $finance->first_name = $dataFinance['first_name'];
        $finance->last_name = $dataFinance['last_name'] ?? null;
        $finance->phone_number = $dataFinance['phone_number'] ?? null;
        $finance->province_id = $dataFinance['province_id'] ?? null;
        $finance->regency_id = $dataFinance['regency_id'] ?? null;
        $finance->district_id = $dataFinance['district_id'] ?? null;
        $finance->full_address = $dataFinance['full_address'] ?? null;
        $finance->profile_img = $dataFinance['profile_img'] ?? null;
        
        $finance->save();

        return $finance;
    }
}
