<?php

namespace App\Services\AgenSubmission;

use LaravelEasyRepository\Service;
use App\Repositories\Agen\AgenRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;
use App\Repositories\AgenSubmission\AgenSubmissionRepository;
use Illuminate\Support\Facades\DB;
use Exception;


class AgenSubmissionServiceImplement extends Service implements AgenSubmissionService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
      protected $mainRepository;
      protected $userRepository;
      protected $agenRepository;

    public function __construct(
        AgenSubmissionRepository $mainRepository,
        UserRepository $userRepository,
        AgenRepository $agenRepository
    ) {
        $this->mainRepository = $mainRepository;
        $this->userRepository = $userRepository;
        $this->agenRepository = $agenRepository;
    }

    public function storeAgenSubmission($dataAgenSub)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataAgenSub, [
                'agen_first_name' => 'required|string|max:255',
                'agen_last_name' => 'nullable|string|max:255',
                'agen_phone_number' => 'required|phone_number',
                'agen_email' => 'required|email|unique:agen_submissions,agen_email',
                'agen_password' => 'required|string|min:6',
                'agen_province_id' => 'nullable|exists:provinces,id',
                'agen_regency_id' => 'nullable|exists:regencies,id',
                'agen_district_id' => 'nullable|exists:districts,id',
                'agen_full_address' => 'nullable|string',
                'latitude' => 'nullable|string',
                'longitude' => 'nullable|string', 
                'building_type' => 'required|string|max:255',
                'building_status' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'ktp_img' => 'nullable|string|max:255',
                'npwp_img' => 'nullable|string|max:255',
                'akta_pendiri_perusahaan_img' => 'nullable|string|max:255',
                'suket_domisili_usaha_img' => 'nullable|string|max:255',
                'surat_izin_usaha_perusahaan_img' => 'nullable|string|max:255',
                'location_img' => 'nullable|string|max:255',
                'building_condition_img' => 'nullable|string|max:255',
                'bank_name' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255'
            ], [
                'agen_first_name' => [
                    'required' => 'Nama depan agen wajib diisi.',
                    'string' => 'Nama depan agen harus berupa teks.',
                    'max' => 'Nama depan agen maksimal 255 karakter.',
                ],
                'agen_last_name' => [
                    'string' => 'Nama belakang agen harus berupa teks.',
                    'max' => 'Nama belakang agen maksimal 255 karakter.',
                ],
                'agen_phone_number' => [
                    'required' => 'Nomor telepon agen wajib diisi.',
                    'phone_number' => 'Harap Masukkan Nomer Telepon yang valid'
                ],
                'agen_email' => [
                    'required' => 'Email agen wajib diisi.',
                    'email' => 'Email agen tidak valid.',
                    'unique' => 'Email agen sudah digunakan.',
                ],
                'agen_password' => [
                    'required' => 'Password agen wajib diisi.',
                    'min' => 'Password agen minimal 6 karakter.',
                ],
                'agen_province_id' => [
                    'exists' => 'Provinsi agen tidak valid.',
                ],
                'agen_regency_id' => [
                    'exists' => 'Kabupaten/Kota agen tidak valid.',
                ],
                'agen_district_id' => [
                    'exists' => 'Kecamatan agen tidak valid.',
                ],
                'building_type' => [
                    'required' => 'Tipe bangunan wajib diisi.',
                    'string' => 'Tipe bangunan harus berupa teks.',
                    'max' => 'Tipe bangunan maksimal 255 karakter.',
                ],
                'building_status' => [
                    'required' => 'Status bangunan wajib diisi.',
                    'string' => 'Status bangunan harus berupa teks.',
                    'max' => 'Status bangunan maksimal 255 karakter.',
                ],
                'location' => [
                    'required' => 'Lokasi wajib diisi.',
                    'string' => 'Lokasi harus berupa teks.',
                    'max' => 'Lokasi maksimal 255 karakter.',
                ],
                'latitude' => [
                    'string' => 'Latitude harus berupa teks.',
                    'max' => 'Latitude maksimal 255 karakter.',
                ],
                'longitude' => [
                    'string' => 'Longitude harus berupa teks.',
                    'max' => 'Longitude maksimal 255 karakter.',
                ],
                'bank_name' => [
                    'required' => 'Nama bank wajib diisi.',
                    'string' => 'Nama bank harus berupa teks.',
                    'max' => 'Nama bank maksimal 255 karakter.',
                ],
                'account_name' => [
                    'required' => 'Nama pemilik rekening wajib diisi.',
                    'string' => 'Nama pemilik rekening harus berupa teks.',
                    'max' => 'Nama pemilik rekening maksimal 255 karakter.',
                ],
                'account_number' => [
                    'required' => 'Nomor rekening wajib diisi.',
                    'string' => 'Nomor rekening harus berupa teks.',
                    'max' => 'Nomor rekening maksimal 255 karakter.',
                ],
                'ktp_img' => [
                    'string' => 'Foto KTP harus berupa URL.',
                    'max' => 'URL foto KTP maksimal 255 karakter.',
                ],
                'npwp_img' => [
                    'string' => 'Foto NPWP harus berupa URL.',
                    'max' => 'URL foto NPWP maksimal 255 karakter.',
                ],
                'akta_pendiri_perusahaan_img' => [
                    'string' => 'Foto Akta Pendirian Perusahaan harus berupa URL.',
                    'max' => 'URL foto Akta Pendirian Perusahaan maksimal 255 karakter.',
                ],
                'suket_domisili_usaha_img' => [
                    'string' => 'Foto Surat Keterangan Domisili Usaha harus berupa URL.',
                    'max' => 'URL foto Surat Keterangan Domisili Usaha maksimal 255 karakter.',
                ],
                'surat_izin_usaha_perusahaan_img' => [
                    'string' => 'Foto Surat Izin Usaha Perusahaan harus berupa URL.',
                    'max' => 'URL foto Surat Izin Usaha Perusahaan maksimal 255 karakter.',
                ],
                'location_img' => [
                    'string' => 'Foto Lokasi harus berupa URL.',
                    'max' => 'URL foto Lokasi maksimal 255 karakter.',
                ],
                'building_condition_img' => [
                    'string' => 'Foto Kondisi Bangunan harus berupa URL.',
                    'max' => 'URL foto Kondisi Bangunan maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $dataAgenSub['agen_password'] = bcrypt($dataAgenSub['agen_password']);

            $result = $this->mainRepository->storeAgenSubmission($dataAgenSub);

            DB::commit();
            return $result;

        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function confirmAgenRegistration($submissionId)
    {
        try {
            DB::beginTransaction();
            
            $submission = $this->mainRepository->find($submissionId);
            
            if (!$submission) {
                throw new Exception("Submission not found");
            }
            
            if ($submission->approval) {
                throw new Exception("This submission is already approved");
            }

            $userData = [
                'first_name' => $submission->agen_first_name,
                'last_name' => $submission->agen_last_name,
                'email' => $submission->agen_email,
                'password' => $submission->agen_password 
            ];

            $user = $this->userRepository->createUserWithRole($userData, 'agen');

            $submission->approval = true;
            $submission->save();

            $agenData = [
                'submission_id' => $submission->id,
                'user_id' => $user->id,
                'first_name' => $submission->agen_first_name,
                'last_name' => $submission->agen_last_name,
                'phone_number' => $submission->agen_phone_number,
                'province_id' => $submission->agen_province_id,
                'regency_id' => $submission->agen_regency_id,
                'district_id' => $submission->agen_district_id,
                'full_address' => $submission->agen_full_address,
                'building_type' => $submission->building_type,
                'building_status' => $submission->building_status,
                'location' => $submission->location,
                'latitude' => $submission->latitude,
                'longitude' => $submission->longitude,
                'bank_name' => $submission->bank_name,
                'account_name' => $submission->account_name,
                'account_number' => $submission->account_number,
            ];

            $result = $this->agenRepository->storeAgenData($agenData);
            
            DB::commit();
            return $result;
            
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function getAllAgenSubmissionWithSearch($request){
        try {
            return $this->mainRepository->getAllAgenSubmissionWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
