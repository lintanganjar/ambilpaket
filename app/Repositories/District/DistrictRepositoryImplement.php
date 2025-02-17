<?php

namespace App\Repositories\District;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\District;

class DistrictRepositoryImplement extends Eloquent implements DistrictRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected District $model;

    public function __construct(District $model)
    {
        $this->model = $model;
    }

    public function getAllDistrictWithSearch($request){
        $query = $this->model->newQuery();


    if ($request->name) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

        if ($request->id) {
            $query->where('id', $request->id);
        }

        if ($request->regency_id) {
            $query->where('regency_id', $request->regency_id);
        }
        return $query->get();
     }
}
