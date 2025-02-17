<?php

namespace App\Repositories\PickupSchedule;

use App\Models\Agen;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\PickUpSchedule;
use Illuminate\Support\Facades\DB;

class PickupScheduleRepositoryImplement extends Eloquent implements PickupScheduleRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(PickUpSchedule $model)
    {
        $this->model = $model;
    }

    public function getAllWithSearch($request)
    {
        $query = $this->model->query();
        // Filter berdasarkan nama agen
        if ($request->nama_agen) {
            $query->whereHas('agen', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama_agen . '%');
            });
        }

        // Filter berdasarkan nama customer UMKM
        if ($request->nama_customer_umkm) {
            $query->whereHas('customerUmkm', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama_customer_umkm . '%');
            });
        }

        return $query->paginate(20);
    }

    public function getAgentById($agenId)
    {
        return Agen::find($agenId); // Menggunakan model Agen untuk mendapatkan data agen
    }
    /**
     * Mendapatkan jadwal pickup agen berdasarkan area yang diberikan
     * 
     * @param array $adminHubArea
     * @return mixed
     */
    public function getJadwalPickupAgenByArea($adminHubArea)
    {
        return DB::table('pick_up_schedule')   
            ->where('province_id', $adminHubArea['province_id'])
            ->where('regency_id', $adminHubArea['regency_id'])
            ->where('district_id', $adminHubArea['district_id'])
            ->get();
    }
    public function storePickupSchedule($data)
    {
        $pickupSchedule = new $this->model;
        $pickupSchedule->request_id = $data['request_id'];
        $pickupSchedule->agen_id = $data['agen_id'];
        $pickupSchedule->customer_umkm_id = $data['customer_umkm_id'];

        $pickupSchedule->save();

        return $pickupSchedule;
    }
}
