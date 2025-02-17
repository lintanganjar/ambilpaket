<?php

namespace App\Repositories\CourierIncome;

use App\Models\User;
use App\Models\CourierIncome;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class CourierIncomeRepositoryImplement extends Eloquent implements CourierIncomeRepository
{
    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(CourierIncome $model)
    {
        $this->model = $model;
    }

    public function getAllCourierIncomeWithSearch($request)
    {
        $user = User::where('id', Auth::user()->id)->with('couriers')->first();

        $query = $this->model::query();

        $query->where('courier_id', $user->couriers->id);

        if ($request->has('parcel_id')) {
            $query->where('parcel_id', $request->parcel_id);
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereDate('created_at', '>=', $request->start_date)
                ->whereDate('created_at', '<=', $request->end_date);
        } elseif ($request->has('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        } elseif ($request->has('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        if ($request->has('sort_by') && $request->sort_by === 'income') {
            $query->orderBy('income', $request->sort_direction ?? 'asc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        if ($request->has('limit')) {
            return $query->paginate($request->limit);
        }

        return $query->get();
    }

    public function getCourierIncomeDetail($id)
    {
        return $this->model->where('id', $id)->with('courier', 'parcel')->first();
    }

    public function storeCourierIncome($data)
    {
        $user = User::where('id', Auth::user()->id)->with('couriers')->first();
        $courierIncome = new $this->model;
        $courierIncome->courier_id = $user->couriers->id;
        $courierIncome->parcel_id = $data['parcel_id'];
        $courierIncome->income = $data['income'];

        $courierIncome->save();

        return $courierIncome;
    }
}
