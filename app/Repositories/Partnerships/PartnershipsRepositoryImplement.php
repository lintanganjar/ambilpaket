<?php

namespace App\Repositories\Partnerships;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Partnerships;

class PartnershipsRepositoryImplement extends Eloquent implements PartnershipsRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected Partnerships $model;

    public function __construct(Partnerships $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }
}
