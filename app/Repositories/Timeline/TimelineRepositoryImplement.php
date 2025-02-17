<?php

namespace App\Repositories\Timeline;

use Exception;
use App\Models\User;
use App\Models\Timeline;
use InvalidArgumentException;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class TimelineRepositoryImplement extends Eloquent implements TimelineRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;
    protected $timelineModel;
    protected $parcelModel;

    public function __construct(Timeline $model)
    {
        $this->model = $model;
    }

    public function getTimeline($search)
    {
        try {
            $user = User::where('id', Auth::user()->id)->with('customer', 'customerUmkm')->first();

            return $this->model
                ->when($user->role === 'Customer', function ($query) use ($user) {
                    $query->whereHas('parcel', function ($parcelQuery) use ($user) {
                        $parcelQuery->where('customer_id', $user->customer->id);
                    });
                })
                ->when($user->role === 'UMKM', function ($query) use ($user) {
                    $query->whereHas('parcel', function ($parcelQuery) use ($user) {
                        $parcelQuery->where('customer_umkm_id', $user->customerUmkm->id);
                    });
                })
                ->where(function ($query) use ($search) {
                    $query->where('detail', 'like', '%' . $search . '%')
                        ->orWhere('date', 'like', '%' . $search . '%');
                })
                ->with('parcel')
                ->get();
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function showTimelineWithParcelId($id)
    {
        return $this->model
            ->where('parcel_id', $id)
            ->with('parcel')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function insertTimeline($data)
    {
        $exist = $this->model->where('parcel_id', $data['parcel_id'])
            ->where('date', $data['date'])
            ->where('detail', $data['detail'])->first();
        if (!$exist) {
            $timeline = new $this->model;

            $timeline->parcel_id = $data['parcel_id'];
            $timeline->date = $data['date'] ?? now();
            $timeline->detail = $data['detail'];

            $timeline->save();

            return $timeline;
        }
    }
    // Fungsi untuk memperbarui data timeline parcel berdasarkan resi_number
    public function updateTimelineByResi($resiNumber, array $timelineData)
    {
        // Cari data parcel berdasarkan resi_number
        $parcel = $this->parcelModel->where('resi_number', $resiNumber)->first();

        if (!$parcel) {
            throw new InvalidArgumentException('Parcel with the specified resi_number not found.');
        }

        // Cari data timeline yang terkait dengan parcel
        $timeline = $this->timelineModel->where('parcel_id', $parcel->id)->first();

        if (!$timeline) {
            throw new InvalidArgumentException('Timeline for the specified parcel not found.');
        }

        // Update data timeline
        $timeline->date = $timelineData['date'] ?? $timeline->date;
        $timeline->detail = $timelineData['detail'] ?? $timeline->detail;

        $timeline->save();

        return $timeline;
    }
}
