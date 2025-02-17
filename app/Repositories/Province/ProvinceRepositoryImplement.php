<?php

namespace App\Repositories\Province;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Province;

class ProvinceRepositoryImplement extends Eloquent implements ProvinceRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Province $model;

    public function __construct(Province $model)
    {
        $this->model = $model;
    }
     public function getAllProvinceWithSearch($request){
        $query = $this->model->with('regencies.districts');

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');

        }

        if ($request->id) {
            $query->where('id', $request->id);
        }

        if ($request->province_id) {
            $query->where('province_id', $request->province_id);
        }

        return $query->get();
     }
}
