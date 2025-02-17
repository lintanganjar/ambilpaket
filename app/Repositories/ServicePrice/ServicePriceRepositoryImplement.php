<?php

namespace App\Repositories\ServicePrice;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\ServicePrice;
use App\Models\ServicesPrices;
use Illuminate\Database\Eloquent\Collection;

class ServicePriceRepositoryImplement extends Eloquent implements ServicePriceRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(ServicesPrices $model)
    {
        $this->model = $model;
    }

    public function getAllWithSearch($request): Collection
    {
        $query = $this->model::query();

        // Apply search filters
        if ($request->filled('origin_city')) {
            $query->where('origin_city', 'like', '%' . $request->input('origin_city') . '%');
        }

        if ($request->filled('destination_city')) {
            $query->where('destination_city', 'like', '%' . $request->input('destination_city') . '%');
        }

        if ($request->filled('service_type_id')) {
            $query->where('service_type_id', $request->input('service_type_id'));
        }

        return $query->with('serviceType', 'serviceType.serviceProvider')->get(); // Eager load service types
    }
}
