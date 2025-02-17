<?php

namespace App\Repositories\Umkm;

use App\Models\CustomerUmkms;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Implementations\Eloquent;

class UmkmRepositoryImplement extends Eloquent implements UmkmRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(CustomerUmkms $model)
    {
        $this->model = $model;
    }

    public function getAllUmkmWithSearch($request)
    {
        $query = $this->model;

        if ($request->email || $request->username) {
            $query = $query->whereHas('user', function ($q) use ($request) {
                if ($request->email) {
                    $q->where('email', 'like', '%' . $request->email . '%');
                }
                if ($request->username) {
                    $q->where('username', 'like', '%' . $request->username . '%');
                }
            });
        }
        
        if ($request->name) {
            $query = $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->name . '%')
                  ->orWhere('last_name', 'like', '%' . $request->name . '%');
            });
        }
        
        if ($request->phone_number) {
            $query = $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
        }
        
        return $query->paginate(20);
    }

    public function getDetailUmkm($id)
    {
        return $this->model->with(['user'])->where('id', $id)->first();
    }
    /**
     * Mendapatkan UMKM berdasarkan area yang diberikan
     * 
     * @param array $adminHubArea
     * @return mixed
     */
    public function getUMKMsByArea($adminHubArea)
    {
        return DB::table('umkms')
            ->where('province_id', $adminHubArea['province_id'])
            ->where('regency_id', $adminHubArea['regency_id'])
            ->where('district_id', $adminHubArea['district_id'])
            ->get();
    }

    public function storeUmkmData($dataUmkm)
    {
        $umkm = new $this->model;
        $umkm->user_id = $dataUmkm['user_id'];
        $umkm->first_name = $dataUmkm['first_name'];
        $umkm->last_name = $dataUmkm['last_name'];
        $umkm->phone_number = $dataUmkm['phone_number'];
        $umkm->company_name = $dataUmkm['company_name'] ?? null;
        $umkm->product_type = $dataUmkm['product_type'] ?? null;
        $umkm->province_id = $dataUmkm['province_id'] ?? null;
        $umkm->regency_id = $dataUmkm['regency_id'] ?? null;
        $umkm->district_id = $dataUmkm['district_id'] ?? null;
        $umkm->full_address = $dataUmkm['full_address'] ?? null;
        $umkm->point = $dataCustomer['point'] ?? 0;
        $umkm->latitude = $dataUmkm['latitude'] ?? null;
        $umkm->longitude = $dataUmkm['longitude'] ?? null;
        $umkm->parcel_average_per_day = $dataUmkm['parcel_average_per_day'] ?? null;
        $umkm->pickup_activation = $dataUmkm['pickup_activation'] ?? true;
        $umkm->days_of_pickup = isset($dataUmkm['days_of_pickup']) ? json_encode($dataUmkm['days_of_pickup']) : null;
        $umkm->time_of_pickup = $dataUmkm['time_of_pickup'] ?? null;
        $umkm->profile_img = $dataUmkm['profile_img'] ?? null;

        $umkm->save();

        return $umkm;
    }
}
