<?php

namespace App\Repositories\TempParcel;

use App\Models\User;
use App\Models\TempParcel;
use Illuminate\Support\Facades\Auth;
use LaravelEasyRepository\Implementations\Eloquent;

class TempParcelRepositoryImplement extends Eloquent implements TempParcelRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(TempParcel $model)
    {
        $this->model = $model;
    }

    public function getAllTempParcelWithSearch($request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($request->search) {
            return $this->model
                ->where('temp_resi_number', 'like', '%' . $request->search . '%')
                ->with('customer', 'customerUmkm', 'servicePrice')
                ->when($user, function ($query) use ($user) {
                    switch ($user->role) {
                        case 'Customer':
                            $newUser = User::with('customer')->where('id', $user->id)->first();
                            $query->where('customer_id',  $newUser->customer->id);
                            break;
                        case 'UMKM':
                            $newUser = User::with('customerUmkm')->where('id', $user->id)->first();
                            $query->where('customer_umkm_id', $newUser->customerUmkm->id);
                            break;
                    }
                })
                ->get();
        } else {
            return $this->model
                ->with('customer', 'customerUmkm', 'servicePrice')
                ->when($user, function ($query) use ($user) {
                    switch ($user->role) {
                        case 'Customer':
                            $newUser = User::with('customer')->where('id', $user->id)->first();
                            $query->where('customer_id',  $newUser->customer->id);
                            break;
                        case 'UMKM':
                            $newUser = User::with('customerUmkm')->where('id', $user->id)->first();
                            $query->where('customer_umkm_id', $newUser->customerUmkm->id);
                            break;
                    }
                })
                ->get();
        }
    }

    public function getTempParcelDetail($id)
    {
        return $this->model->where('id', $id)->with('customer', 'customerUmkm', 'servicePrice')->first();
    }

    public function storeTempParcelData($data)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $tempParcels = new $this->model;
        $tempParcels->temp_resi_number = $data['temp_resi_number'];
        switch ($user->role) {
            case 'Customer':
                $newUser = User::with('customer')->where('id', $user->id)->first();
                $tempParcels->customer_id = $newUser->customer->id;
                $tempParcels->customer_umkm_id = null;
                break;
            case 'UMKM':
                $newUser = User::with('customerUmkm')->where('id', $user->id)->first();
                $tempParcels->customer_id = null;
                $tempParcels->customer_umkm_id = $newUser->customerUmkm->id;
                break;
        }
        $tempParcels->price = $data['price'];
        $tempParcels->item_type = $data['item_type'];
        $tempParcels->item_name = $data['item_name'];
        $tempParcels->amount = $data['amount'];
        $tempParcels->weight = $data['weight'];
        $tempParcels->item_height = $data['item_height'] ?? null;
        $tempParcels->item_width = $data['item_width'] ?? null;
        $tempParcels->item_length = $data['item_length'] ?? null;
        $tempParcels->note = $data['note'] ?? null;
        $tempParcels->service_price_id = $data['service_price_id'];
        $tempParcels->estimation_date = $data['estimation_date'];

        $tempParcels->save();

        switch ($user->role) {
            case 'Customer':
                $tempParcels->load('customer', 'servicePrice');
                break;
            case 'UMKM':
                $tempParcels->load('customerUmkm', 'servicePrice');
                break;
        }

        return $tempParcels;
    }
}
