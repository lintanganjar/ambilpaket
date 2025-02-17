<?php

namespace App\Repositories\Superadmin;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Superadmin;

class SuperadminRepositoryImplement extends Eloquent implements SuperadminRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Superadmin $model)
    {
        $this->model = $model;
    }

    public function getDetailSuperadmin($id) 
    {
        return $this->model->with(['user'])->where('id', $id)->first();
    }

    public function storeSuperadminData($dataSuperadmin)
    {
        $superadmin = new $this->model;
        $superadmin->user_id = $dataSuperadmin['user_id'];
        $superadmin->first_name = $dataSuperadmin['first_name'];
        $superadmin->last_name = $dataSuperadmin['last_name'] ?? null;
        $superadmin->phone_number = $dataSuperadmin['phone_number'] ?? null;
        $superadmin->province_id = $dataSuperadmin['province_id'] ?? null;
        $superadmin->regency_id = $dataSuperadmin['regency_id'] ?? null;
        $superadmin->district_id = $dataSuperadmin['district_id'] ?? null;
        $superadmin->full_address = $dataSuperadmin['full_address'] ?? null;
        $superadmin->profile_img = $dataSuperadmin['profile_img'] ?? null;
        
        $superadmin->save();

        return $superadmin;
    }
}
