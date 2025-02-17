<?php

namespace App\Repositories\ParcelAssignment;

use App\Models\User;
use App\Models\ParcelAssignment;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class ParcelAssignmentRepositoryImplement extends Eloquent implements ParcelAssignmentRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(ParcelAssignment $model)
    {
        $this->model = $model;
    }

    public function getAllWithSearch($request)
    {
        $search = $request->input('search');
        $user = User::where('id', Auth::user()->id)->first();
        $status = $request->input('status');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = $this->model->newQuery();

        if ($search) {
            $query->whereHas('parcels', function ($query) use ($search) {
                $query->where('resi_number', 'like', "%$search%");
            });
        }

        if ($startDate || $endDate) {
            $start = $startDate;
            $end = $endDate;
            $query->whereBetween('assignment_date', [$start, $end]);
        }

        if ($status) {
            $query->where('status', $status);
        }

        return $query->with(['couriers', 'parcels', 'parcels.parcelReceiver', 'parcels.parcelSender'])
            ->where('kurir_id', $user['couriers']->id)
            ->get();
    }

    public function getDetailByResiNumber($resiNumber)
    {
        return $this->model->whereHas('parcels', function ($query) use ($resiNumber) {
            $query->where('resi_number', $resiNumber);
        })->with([
            'couriers',
            'parcels' => function ($query) use ($resiNumber) {
                $query->where('resi_number', $resiNumber)
                    ->with('parcelReceiver', 'parcelSender');
            }
        ])->first();
    }

    public function findById($id)
    {
        return $this->model->where('id', $id)->with('couriers', 'parcels', 'parcels.parcelReceiver', 'parcels.parcelSender')->first();
    }

    public function insertParcelAssignment($data)
    {
        $parcelAssignment = new $this->model;

        $parcelAssignment->assignment_date = $data['assignment_date'];
        $parcelAssignment->kurir_id = $data['kurir_id'];
        $parcelAssignment->parcel_id = $data['parcel_id'];
        $parcelAssignment->status_reason = $data['status_reason'] ?? null;
        $parcelAssignment->status = $data['status'] ?? null;

        $parcelAssignment->save();

        return $parcelAssignment;
    }
    public function getCourierAssignmentsHistory($courierId, $search = null)
    {
        $query = $this->model::where('kurir_id', $courierId)
            ->with([
                'parcels' => function ($query) {
                    $query->select([
                        'id',
                        'resi_number',
                        'actual_resi_number',
                        'item_name',
                        'weight',
                        'status',
                        'service_price_id'
                    ]);
                },
                'couriers' => function ($query) {
                    $query->select([
                        'id',
                        'first_name',
                        'last_name',
                        'area_id',
                        'courier_type'
                    ])->with('area:id,name');
                },
            ])
            ->select([
                'id',
                'assignment_date',
                'kurir_id',
                'parcel_id',
                'status_reason',
                'status',
                'created_at'
            ]);

        // Pencarian berdasarkan nomor resi
        if ($search) {
            $query->whereHas('parcels', function ($subQuery) use ($search) {
                $subQuery->where('resi_number', 'like', "%$search%")
                    ->orWhere('actual_resi_number', 'like', "%$search%");
            });
        }

        return $query->orderBy('assignment_date', 'desc')
            ->get();
    }
}
