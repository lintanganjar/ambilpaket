<?php

namespace App\Repositories\Customer;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerRepositoryImplement extends Eloquent implements CustomerRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Customer $model)
    {
        $this->model = $model;
    }


    public function getAllCustomerWithSearch($request)
    {
        if ($request->email && $request->username && $request->first_name && $request->last_name && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%')
                    ->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->email && $request->username && $request->name) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%')
                    ->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->email && $request->username && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%')
                    ->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->email && $request->name) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->email && $request->name && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->username && $request->name && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->username && $request->last_name && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->first_name && $request->last_name && $request->phone_number) {
            return $this->model
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->email && $request->username) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%')
                    ->where('username', 'like', '%' . $request->username . '%');
            })
                ->paginate(20);
        } elseif ($request->email && $request->name) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->email && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            })
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->username && $request->name) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->username && $request->phone_number) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->first_name && $request->last_name) {
            return $this->model
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->name && $request->phone_number) {
            return $this->model
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } elseif ($request->email) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            })
                ->paginate(20);
        } elseif ($request->username) {
            return $this->model->whereHas('user', function ($q) use ($request) {
                $q->where('username', 'like', '%' . $request->username . '%');
            })
                ->paginate(20);
        } elseif ($request->name) {
            return $this->model
                ->where('first_name', 'like', '%' . $request->name . '%')
                ->orwhere('last_name', 'like', '%' . $request->name . '%')
                ->paginate(20);
        } elseif ($request->phone_number) {
            return $this->model
                ->where('phone_number', 'like', '%' . $request->phone_number . '%')
                ->paginate(20);
        } else {
            return $this->model->paginate(20);
        }
    }
    public function getCustomersByArea($area)
    {
       
        return DB::table('customers')
            ->where('province_id', $area['province_id']) 
            ->where('regency_id', $area['regency_id']) 
            ->where('district_id', $area['district_id']) 
            ->get();
    }

    public function getCustomerDetail($id)
    {
        return $this->model->with('user')->where('id', $id)->first();
    }
    public function storeCustomerData($dataCustomer)
    {
        $customer = new $this->model;
        $customer->user_id = $dataCustomer['user_id'];
        $customer->first_name = $dataCustomer['first_name'];
        $customer->last_name = $dataCustomer['last_name'];
        $customer->phone_number = $dataCustomer['phone_number'] ?? null;
        $customer->province_id = $dataCustomer['province_id'] ?? null;
        $customer->regency_id = $dataCustomer['regency_id'] ?? null;
        $customer->district_id = $dataCustomer['district_id'] ?? null;
        $customer->postal_code = $dataCustomer['postal_code'] ?? null;
        $customer->full_address = $dataCustomer['full_address'] ?? null;
        $customer->point = $dataCustomer['point'] ?? 0;
        $customer->profile_img = $dataCustomer['profile_img'] ?? null;


        $customer->save();

        return $customer;
    }
}
