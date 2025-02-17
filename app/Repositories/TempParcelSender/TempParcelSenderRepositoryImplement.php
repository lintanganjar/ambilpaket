<?php

namespace App\Repositories\TempParcelSender;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\TempParcelSender;

class TempParcelSenderRepositoryImplement extends Eloquent implements TempParcelSenderRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(TempParcelSender $model)
    {
        $this->model = $model;
    }

    public function getTempParcelSenderDetailByParcelId($parcelId)
    {
        return $this->model->where('parcel_id', $parcelId)->with('parcel', 'province', 'regency', 'district')->first();
    }

    public function storeTempParcelSenderData($data)
    {
        $tempParcelSender = new $this->model;
        $tempParcelSender->parcel_id = $data['parcel_id'];
        $tempParcelSender->sender_first_name = $data['sender_first_name'];
        $tempParcelSender->sender_last_name = $data['sender_last_name'];
        $tempParcelSender->sender_phone_number = $data['sender_phone_number'];
        $tempParcelSender->sender_email = $data['sender_email'];
        $tempParcelSender->sender_province_id = $data['sender_province_id'];
        $tempParcelSender->sender_regency_id = $data['sender_regency_id'];
        $tempParcelSender->sender_district_id = $data['sender_district_id'];
        $tempParcelSender->sender_postal_code = $data['sender_postal_code'];
        $tempParcelSender->sender_full_address = $data['sender_full_address'];

        $tempParcelSender->save();

        $tempParcelSender->load('parcel', 'province', 'regency', 'district');

        return $tempParcelSender;
    }
}
