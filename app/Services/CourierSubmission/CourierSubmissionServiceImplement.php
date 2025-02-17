<?php

namespace App\Services\CourierSubmission;

use LaravelEasyRepository\Service;
use App\Repositories\User\UserRepository;
use App\Repositories\Courier\CourierRepository;
use App\Repositories\CourierSubmissions\CourierSubmissionsRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class CourierSubmissionServiceImplement extends Service implements CourierSubmissionService
{
    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $userRepository;
    protected $courierRepository;

    public function __construct(
        CourierSubmissionsRepository $mainRepository,
        UserRepository $userRepository,
        CourierRepository $courierRepository
    ) {
        $this->mainRepository = $mainRepository;
        $this->userRepository = $userRepository;
        $this->courierRepository = $courierRepository;
    }

    public function storeCourierSubmission($dataCourierSub)
    {
        try {
            $validator = Validator::make($dataCourierSub, [
                'courier_type' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'required|phone_number',
                'gender' => 'required|string',
                'profile_img' => 'nullable|string|max:255',
                'area_id' => 'required|exists:areas,id',
                'balance' => 'nullable|numeric',
                'bank_name' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
            ], [
                'courier_type' => [
                    'required' => 'Tipe kurir wajib diisi.',
                    'string' => 'Tipe kurir harus berupa teks.',
                    'max' => 'Tipe kurir maksimal 255 karakter.',
                ],
                'first_name' => [
                    'required' => 'Nama depan wajib diisi.',
                    'string' => 'Nama depan harus berupa teks.',
                    'max' => 'Nama depan maksimal 255 karakter.',
                ],
                'last_name' => [
                    'string' => 'Nama belakang harus berupa teks.',
                    'max' => 'Nama belakang maksimal 255 karakter.',
                ],
                'phone_number' => [
                    'required' => 'Nomor telepon wajib diisi.',
                    'phone_number' => 'Harap Masukkan Nomer Telepon yang valid'
                ],
                'gender' => [
                    'required' => 'Jenis kelamin wajib diisi.',
                    'string' => 'Jenis kelamin harus berupa teks.',
                ],
                'profile_img' => [
                    'string' => 'URL profil harus berupa teks.',
                    'max' => 'URL profil maksimal 255 karakter.',
                ],
                'area_id' => [
                    'required' => 'Area wajib dipilih.',
                    'exists' => 'Area tidak ditemukan.',
                ],
                'balance' => [
                    'numeric' => 'Saldo harus berupa angka.',
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
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            return $this->mainRepository->storeCourierSubmission($dataCourierSub);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Metode untuk menemukan submission berdasarkan ID
    

    public function confirmCourierRegistration($submissionId)
    {
        try {
            DB::beginTransaction();

            $submission = $this->mainRepository->find($submissionId);

            if (!$submission) {
                throw new Exception("Submission not found");
            }

            if ($submission->approval   ) {
                throw new Exception("This submission is already approved");
            }

            $userData = [
                'first_name' => $submission->first_name,
                'last_name' => $submission->last_name,
                'email' => $submission->email,
                'password' => bcrypt('defaultpassword') // Set default password
            ];

            $user = $this->userRepository->createUserWithRole($userData, 'courier');

            $submission->approval = true;
            $submission->save();

            $courierData = [
                'submission_id' => $submission->id,
                'courier_type' => $submission->courier_type,
                'user_id' => $user->id,
                'first_name' => $submission->first_name,
                'last_name' => $submission->last_name,
                'email' => $submission->email,
                'phone_number' => $submission->phone_number,
                'gender' => $submission->gender,
                'profile_img' => $submission->profile_img,
                'area_id' => $submission->area_id,
                'balance' => $submission->balance ?? 0,
                'bank_name' => $submission->bank_name,
                'account_name' => $submission->account_name,
                'account_number' => $submission->account_number,
            ];

            $result = $this->courierRepository->storeCourierData($courierData);

            DB::commit();
            return $result;

        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
