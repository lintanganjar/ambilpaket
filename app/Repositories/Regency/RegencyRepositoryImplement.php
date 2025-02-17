<?php

namespace App\Repositories\Regency;

use App\Models\Regency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\Implementations\Eloquent;

class RegencyRepositoryImplement extends Eloquent implements RegencyRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Regency $model;

    public function __construct(Regency $model)
    {
        $this->model = $model;
    }

    public function getAllRegencyWithSearch($request){
        $query = $this->model->newQuery();


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
