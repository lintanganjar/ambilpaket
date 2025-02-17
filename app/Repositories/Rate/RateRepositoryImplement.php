<?php

namespace App\Repositories\Rate;

use Exception;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class RateRepositoryImplement extends Eloquent implements RateRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Rate $model)
    {
        $this->model = $model;
    }

    public function getAllRate()
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
                ->with('parcel')
                ->get();
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Unable to fetch timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function showRatingById($id)
    {
        return $this->model->where('id', $id)->with('parcel')->get();
    }

    public function showRatingByParcelId($parcelId)
    {
        return $this->model->where('parcel_id', $parcelId)->with('parcel')->get();
    }

    public function rating($data)
    {
        $rating = new $this->model;
        $rating['parcel_id'] = $data['parcel_id'];
        $rating['kurir_id'] = $data['kurir_id'];
        $rating['expedition_rate'] = $data['expedition_rate'] ?? null;
        $rating['expedition_comment'] = $data['expedition_comment'] ?? null;
        $rating['kurir_rate'] = $data['kurir_rate'] ?? null;
        $rating['kurir_comment'] = $data['kurir_comment'] ?? null;
        $rating->save();

        return $rating;
    }
}
