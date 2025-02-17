<?php

namespace App\Repositories\ServiceType;

use App\Models\ServicesTypes;
use LaravelEasyRepository\Implementations\Eloquent;

class ServiceTypeRepositoryImplement extends Eloquent implements ServiceTypeRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(ServicesTypes $model)
    {
        $this->model = $model;
    }

    public function getTypeWithId($id)
    {
        return $this->model->with('serviceProvider')->where('id',$id)->first();
    }

    public function getAllTypesWithSearch($request)
    {
        // Mulai query dari model ServicesTypes
        $query = ServicesTypes::query();

        // Filter berdasarkan service_provider_id jika ada
        if ($request->has('service_provider_id') && $request->service_provider_id) {
            $query->where('service_provider_id', $request->service_provider_id);
        }

        // Filter berdasarkan nama jika ada
        if ($request->has('name') && $request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }

        // Filter berdasarkan note jika ada
        if ($request->has('note') && $request->note) {
            $query->where('note', 'LIKE', '%' . $request->note . '%');
        }

        // Mengurutkan hasil berdasarkan nama secara default
        $query->orderBy('name', 'asc');

        // Mengembalikan hasil dengan pagination jika ada parameter limit
        if ($request->has('limit')) {
            return $query->paginate($request->limit);
        }

        // Mengembalikan semua data jika tidak ada limit
        return $query->get();
    }
    
    public function storeServiceData($data)
    {
        $service = new $this->model;
        $service['service_provider_id'] = $data['service_provider_id'];
        $service['name'] = $data['type_name'];
        $service['note'] = $data['note'] ?? null;

        $service->save();

        return $service;
    }
}
