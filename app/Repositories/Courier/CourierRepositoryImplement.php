<?php

namespace App\Repositories\Courier;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Courier;
use App\Models\Couriers;
use Illuminate\Support\Facades\DB;

class CourierRepositoryImplement extends Eloquent implements CourierRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Couriers $model)
    {
        $this->model = $model;
    }

    public function getAllCouriersWithSearch($request)
    {
        $query = $this->model::query();
        if ($request->search) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%');
        }
        return $query->paginate(20);
    }
    /**
     * Mendapatkan kurir berdasarkan area yang diberikan
     * 
     * @param array $adminHubArea
     * @return mixed
     */
    public function getCouriersByArea($adminHubArea)
    {
        return DB::table('couriers')
            ->where('province_id', $adminHubArea['province_id'])
            ->where('regency_id', $adminHubArea['regency_id'])
            ->where('district_id', $adminHubArea['district_id'])
            ->get();
    }
    public function getDetailCourier($id)
    {
        return $this->model->with(['user'])->where('id', $id)->first();
    }

    public function storeCourierData(array $data)
    {
        $courier = new $this->model;

        $courier->user_id = $data['user_id'];
        $courier->courier_type = $data['courier_type'];
        $courier->first_name = $data['first_name'];
        $courier->last_name = $data['last_name'];
        $courier->phone_number = $data['phone_number'];
        $courier->gender = $data['gender'];
        $courier->profile_img = $data['profile_img'];
        $courier->area_id = $data['area_id'];
        $courier->balance = $data['balance'];
        $courier->bank_name = $data['bank_name'];
        $courier->account_name = $data['account_name'];
        $courier->account_number = $data['account_number'];

        $courier->save();

        return $courier;
    }

    // public function confirmCourierRegistration($id)
    // {
    //     $courier = Couriers::findOrFail($id);
    //     $courier->is_confirmed = true;
    //     $courier->save();
    //     return $courier;
    // }

    public function updateCourier($id, array $data)
    {
        $courier = Couriers::findOrFail($id);
        $courier->update($data);
        return $courier;
    }
}
