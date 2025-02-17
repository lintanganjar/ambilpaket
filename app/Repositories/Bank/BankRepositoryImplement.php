<?php

namespace App\Repositories\Bank;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Bank;

class BankRepositoryImplement extends Eloquent implements BankRepository
{
    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Bank $model)
    {
        $this->model = $model;
    }

    public function getAllBankWithSearch($request) {
        $query = $this->model->newQuery();

        if ($request->name) {
            $query->where('name', 'like', '%' . $request->name . '%');

        }

        if ($request->id) {
            $query->where('id', $request->id);
        }

        return $query->get();
     }
}
