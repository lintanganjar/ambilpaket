<?php

namespace App\Repositories\AgenSubmission;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\AgenSubmissions;
use App\Models\Scopes\AgenSubmissionScope;

class AgenSubmissionRepositoryImplement extends Eloquent implements AgenSubmissionRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(AgenSubmissions $model)
    {
        $this->model = $model;
    }

    public function storeAgenSubmission($dataAgenSub)
    {
        $submission = new $this->model;
        $submission->agen_first_name = $dataAgenSub['agen_first_name'];
        $submission->agen_last_name = $dataAgenSub['agen_last_name'] ?? null;
        $submission->agen_phone_number = $dataAgenSub['agen_phone_number'];
        $submission->agen_email = $dataAgenSub['agen_email'];
        $submission->agen_password = $dataAgenSub['agen_password'];
        $submission->agen_province_id = $dataAgenSub['agen_province_id'] ?? null;
        $submission->agen_regency_id = $dataAgenSub['agen_regency_id'] ?? null;
        $submission->agen_district_id = $dataAgenSub['agen_district_id'] ?? null;
        $submission->agen_full_address = $dataAgenSub['agen_full_address'] ?? null;
        $submission->latitude = $dataAgenSub['latitude'] ?? null;
        $submission->longitude = $dataAgenSub['longitude'] ?? null;
        $submission->building_type = $dataAgenSub['building_type'];
        $submission->building_status = $dataAgenSub['building_status'];
        $submission->location = $dataAgenSub['location'];
        $submission->ktp_img = $dataAgenSub['ktp_img'] ?? null;
        $submission->npwp_img = $dataAgenSub['npwp_img'] ?? null;
        $submission->akta_pendiri_perusahaan_img = $dataAgenSub['akta_pendiri_perusahaan_img'] ?? null;
        $submission->suket_domisili_usaha_img = $dataAgenSub['suket_domisili_usaha_img'] ?? null;
        $submission->surat_izin_usaha_perusahaan_img = $dataAgenSub['surat_izin_usaha_perusahaan_img'] ?? null;
        $submission->location_img = $dataAgenSub['location_img'] ?? null;
        $submission->building_condition_img = $dataAgenSub['building_condition_img'] ?? null;
        $submission->approval = false; 
        $submission->bank_name = $dataAgenSub['bank_name'];
        $submission->account_name = $dataAgenSub['account_name'];
        $submission->account_number = $dataAgenSub['account_number'];

        $submission->save();

        return $submission;
    }

    public function getAllAgenSubmissionWithSearch($request){
        $query = $this->model->with(['district','regency','province']);
        if (
            !$request->email && !$request->name &&
            !$request->first_name && !$request->last_name &&
            !$request->phone_number && !$request->search
        ) {
            return $query->paginate(20);
        }
        $query = $query->withoutGlobalScope(AgenSubmissionScope::class);
        if ($request->email || $request->name || $request->first_name || $request->last_name  || $request->phone_number || $request->search) {
            if ($request->email) {
                $query->where('agen_email', 'like', '%' . $request->email . '%');
            }
            if ($request->first_name) {
                $query->where('agen_first_name', 'like', '%' . $request->first_name . '%');
            }
            if ($request->last_name) {
                $query->where('agen_last_name', 'like', '%' . $request->last_name . '%');
            }

            if ($request->name || $request->search) {
                $query->where('agen_first_name', 'like', '%' . $request->name . '%')
                    ->orwhere('agen_last_name', 'like', '%' . $request->name . '%');
            }

            if ($request->phone_number) {
                $query->where('agen_phone_number', 'like', '%' . $request->phone_number . '%');
            }
        }
        return $query->paginate(20);
    }
}
