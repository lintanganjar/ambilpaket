<?php

namespace App\Repositories\Merch;

use App\Models\Merchandise;
use LaravelEasyRepository\Implementations\Eloquent;

class MerchRepositoryImplement extends Eloquent implements MerchRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Merchandise $model)
    {
        $this->model = $model;
    }

    public function getAllMerchWithSearch($request)
    {
        $query = $this->model->query();

        // Filter berdasarkan range point
        if ($request->point_range && $request->point_range !== 'all') {
            switch ($request->point_range) {
                case '0-150':
                    $query->whereBetween('point', [0, 150]);
                    break;
                case '150-300':
                    $query->whereBetween('point', [150, 300]);
                    break;
                case '300-600':
                    $query->whereBetween('point', [300, 600]);
                    break;
                case '>600':
                    $query->where('point', '>', 600);
                    break;
            }
        }

        // Filter berdasarkan nama
        if ($request->search) {
            $query->where('name', 'LIKE', "%{$request->search}%");
        }

        return $query->paginate(20);
    }

    public function getDetailMerch($id)
    {
        return $this->model->find($id);
    }

    public function getMerchHistory()
    {
        // Mengambil riwayat merch berdasarkan user atau lainnya
        return $this->model->orderBy('created_at', 'desc')->get();
    }


    public function storeMerchData($dataMerch)
    {
        $merch = new $this->model;
        $merch->name = $dataMerch['name'];
        $merch->stock = $dataMerch['stock'];
        $merch->merchandise_img = $dataMerch['merchandise_img'] ?? null;
        $merch->point = $dataMerch['point'];
        $merch->available = $dataMerch['available'] ?? true;

        $merch->save();

        return $merch;
    }

    public function deleteMerch($id)
    {
        $merch = $this->model->find($id);

        if (!$merch) {
            return false;
        }

        return $merch->delete();
    }

    public function updateMerchStock($id, $data)
    {
        $merch = $this->model->find($id);

        if (!$merch) {
            return false;
        }

        $merch->fill($data);
        $merch->save();

        return $merch;
    }
}
