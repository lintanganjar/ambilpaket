<?php

namespace App\Repositories\ServiceProvider;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ServiceProvider;
use App\Models\ServicesProviders;

class ServiceProviderRepositoryImplement extends Eloquent implements ServiceProviderRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(ServicesProviders $model)
    {
        $this->model = $model;
    }

    /**
     * Get all service providers with optional search functionality
     */
    public function getAllWithSearch($request)
    {
        $search = $request->input('search');

        return $this->model->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })->with('serviceTypes')->get();
    }

    public function detailService($id)
    {
        return $this->model->with('serviceTypes')->where('id',$id)->first();
    }

    public function storeServiceData($data)
    {
        $service = new $this->model;

        $service['name'] = $data['provider_name'];
        $service['courier_code'] = $data['courier_code'];
        $service['logo'] = $data['logo'];

        $service->save();

        return $service;
    }

}
