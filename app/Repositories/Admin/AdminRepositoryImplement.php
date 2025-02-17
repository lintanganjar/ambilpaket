<?php

namespace App\Repositories\Admin;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Admin;

class AdminRepositoryImplement extends Eloquent implements AdminRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function getAllAdminWithSearch($request)
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
    public function getAdminDetail($id)
    {
        return $this->model->with(['user','hubs'])->where('id',$id)->first();
    }

    public function storeAdminData($dataAdmin)
    {
        $admin = new $this->model;
        $admin->user_id = $dataAdmin['user_id'];
        $admin->hub_id = $dataAdmin['hub_id'] ?? null;
        $admin->first_name = $dataAdmin['first_name'];
        $admin->last_name = $dataAdmin['last_name'];
        $admin->phone_number = $dataAdmin['phone_number'] ?? null;
        $admin->province_id = $dataAdmin['province_id'] ?? null;
        $admin->regency_id = $dataAdmin['regency_id'] ?? null;
        $admin->district_id = $dataAdmin['district_id'] ?? null;
        $admin->full_address = $dataAdmin['full_address'] ?? null;
        $admin->profile_img = $dataAdmin['profile_img'] ?? null;

        $admin->save();

        return $admin;
    }
}
