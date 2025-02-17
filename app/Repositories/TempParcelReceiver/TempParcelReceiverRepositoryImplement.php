<?php

namespace App\Repositories\TempParcelReceiver;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\TempParcelReceiver;

class TempParcelReceiverRepositoryImplement extends Eloquent implements TempParcelReceiverRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(TempParcelReceiver $model)
    {
        $this->model = $model;
    }

    public function getTempParcelReceiverDetailByParcelId($parcelId)
    {
        return $this->model->where('parcel_id', $parcelId)->with('parcel', 'province', 'regency', 'district')->first();
    }

    public function storeTempParcelReceiverData($data)
    {
        $tempParcelReceiver = new $this->model;
        $tempParcelReceiver->parcel_id = $data['parcel_id'];
        $tempParcelReceiver->reciever_first_name = $data['reciever_first_name'];
        $tempParcelReceiver->reciever_last_name = $data['reciever_last_name'];
        $tempParcelReceiver->reciever_phone_number = $data['reciever_phone_number'];
        $tempParcelReceiver->reciever_email = $data['reciever_email'];
        $tempParcelReceiver->reciever_province_id = $data['reciever_province_id'];
        $tempParcelReceiver->reciever_regency_id = $data['reciever_regency_id'];
        $tempParcelReceiver->reciever_district_id = $data['reciever_district_id'];
        $tempParcelReceiver->reciever_postal_code = $data['reciever_postal_code'];
        $tempParcelReceiver->reciever_full_address = $data['reciever_full_address'];
        $tempParcelReceiver->reciever_latitude = $data['reciever_latitude'] ?? null;
        $tempParcelReceiver->reciever_longitude = $data['reciever_longitude'] ?? null;

        $tempParcelReceiver->save();

        $tempParcelReceiver->load('parcel', 'province', 'regency', 'district');

        return $tempParcelReceiver;
    }
}
