<?php

namespace App\Services\Finance;

use LaravelEasyRepository\Service;
use App\Repositories\Finance\FinanceRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class FinanceServiceImplement extends Service implements FinanceService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(FinanceRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllFinanceWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllFinanceWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getFinanceDetail($id)
    {
        try {
            return $this->mainRepository->getDetailFinance($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function storeFinanceData($dataFinance)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataFinance, [
                'user_id' => 'required|unique:finances,user_id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'required|phone_number',
                'province_id' => 'nullable|exists:provinces,id',
                'regency_id' => 'nullable|exists:regencies,id',
                'district_id' => 'nullable|exists:districts,id',
                'full_address' => 'nullable|string',
                'profile_img' => 'nullable|string|max:255'
            ], [
                'user_id' => [
                    'required' => 'User ID wajib diisi.',
                    'unique' => 'User ID sudah digunakan.',
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
                    'phone_number' => 'Nomor telepon tidak valid.',
                ],
                'province_id' => [
                    'exists' => 'Provinsi tidak ditemukan.',
                ],
                'regency_id' => [
                    'exists' => 'Kabupaten/Kota tidak ditemukan.',
                ],
                'district_id' => [
                    'exists' => 'Kecamatan tidak ditemukan.',
                ],
                'full_address' => [
                    'string' => 'Alamat lengkap harus berupa teks.',
                    'max' => 'Alamat lengkap maksimal 255 karakter.',
                ],
                'profile_img' => [
                    'string' => 'URL profil harus berupa teks.',
                    'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storeFinanceData($dataFinance);
            
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updateFinanceData($id, $data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|phone_number',
                'province_id' => 'required|exists:provinces,id',
                'regency_id' => 'required|exists:regencies,id',
                'district_id' => 'required|exists:districts,id',
                'full_address' => 'required|string',
                'profile_img' => 'required|string|max:255'
            ], [
                'first_name' => [
                    'required' => 'Nama depan wajib diisi.',
                    'string' => 'Nama depan harus berupa teks.',
                    'max' => 'Nama depan maksimal 255 karakter.',
                ],
                'last_name' => [
                    'required' => 'Nama belakang wajib diisi.',
                    'string' => 'Nama belakang harus berupa teks.',
                    'max' => 'Nama belakang maksimal 255 karakter.',
                ],
                'phone_number' => [
                    'required' => 'Nomor telepon wajib diisi.',
                    'phone_number' => 'Nomor telepon tidak valid.',
                ],
                'province_id' => [
                    'required' => 'Provinsi wajib dipilih.',
                    'exists' => 'Provinsi tidak ditemukan.',
                ],
                'regency_id' => [
                    'required' => 'Kabupaten/Kota wajib dipilih.',
                    'exists' => 'Kabupaten/Kota tidak ditemukan.',
                ],
                'district_id' => [
                    'required' => 'Kecamatan wajib dipilih.',
                    'exists' => 'Kecamatan tidak ditemukan.',
                ],
                'full_address' => [
                    'required' => 'Alamat lengkap wajib diisi.',
                    'string' => 'Alamat lengkap harus berupa teks.',
                ],
                'profile_img' => [
                    'required' => 'URL profil wajib diisi.',
                    'string' => 'URL profil harus berupa teks.',
                    'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $finance = $this->mainRepository->find($id);
            if (!$finance) {
                throw new Exception("Finance with ID {$id} not found");
            }

            $this->mainRepository->update($id, $data);

            $updatedFinance = $this->mainRepository->find($id);
            
            DB::commit();
            return $updatedFinance;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function deleteFinanceData($id)
    {
        try {
            DB::beginTransaction();

            $finance = $this->mainRepository->find($id);
            if (!$finance) {
                throw new Exception("Finance with ID {$id} not found");
            }

            $this->mainRepository->delete($id);

            DB::commit();
            return ['message' => 'Finance data deleted successfully.'];
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
