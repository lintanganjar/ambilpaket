<?php

namespace App\Repositories\CourierSubmissions;

use App\Models\CourierSubmission;
use LaravelEasyRepository\Implementations\Eloquent;

class CourierSubmissionsRepositoryImplement extends Eloquent implements CourierSubmissionsRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(CourierSubmission $model)
    {
        $this->model = $model;
    }

    public function storeCourierSubmission($data)
    {
        $submission = new $this->model;
        $submission->courier_type = $data['courier_type'];
        $submission->first_name = $data['first_name'];
        $submission->last_name = $data['last_name'] ?? null;
        $submission->email = $data['email'];
        $submission->phone_number = $data['phone_number'];
        $submission->gender = $data['gender'];
        $submission->profile_img = $data['profile_img'] ?? null;
        $submission->area_id = $data['area_id'];
        $submission->balance = $data['balance'] ?? 0;
        $submission->bank_name = $data['bank_name'];
        $submission->account_name = $data['account_name'];
        $submission->account_number = $data['account_number'];
        $submission->approval = $data['approval'] ?? null;
        $submission->created_at = now();
        $submission->updated_at = now();

        $submission->save();

        return $submission;
    }
}
