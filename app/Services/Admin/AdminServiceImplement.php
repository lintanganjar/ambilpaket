<?php

namespace App\Services\Admin;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Admin\AdminRepository;

class AdminServiceImplement extends Service implements AdminService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(AdminRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllAdminWithSearch($request)
    {
      return $this->mainRepository->getAllAdminWithSearch($request);
    }
    public function getAdminDetail($id)
    {
      return $this->mainRepository->getAdminDetail($id);
    }
    public function storeAdminData($dataAdmin)
    {
      $validator = Validator::make($dataAdmin, [
        'hub_id' => 'integer',
        'first_name' => 'bail|required|string|max:255',
        'last_name' => 'bail|required|string|max:255',
        'phone_number' => 'phone_number',
        'full_address' => 'string|max:255',
        'profile_img' => 'string|max:255',
      ], [
        'hub_id.integer' => 'ID Hub harus berupa angka.',
        'first_name' => [
          'required' => 'Nama depan wajib diisi.',
          'string' => 'Nama depan harus berupa teks.',
          'max' => 'Nama depan maksimal 255 karakter.',
        ],
        'last_name' => [
          'required' => 'Nama depan wajib diisi.',
          'string' => 'Nama depan harus berupa teks.',
          'max' => 'Nama depan maksimal 255 karakter.',
        ],
        'phone_number.phone_number' => 'Harap Masukkan Nomer Telepon yang valid',
        'full_address' => [
          'string' => 'Alamat lengkap harus berupa teks.',
          'max' => 'Alamat lengkap maksimal 255 karakter.',
        ],
        'profile_img' => [
          'string' => 'URL profil harus berupa teks.',
          'max' => 'URL profil maksimal 255 karakter.',],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }
      
      if (str_starts_with($dataAdmin['phone_number'],'08')) {
        $dataAdmin['phone_number'] = '62'.substr($dataAdmin['phone_number'],1);
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->storeAdminData($dataAdmin);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Store Data');
      }

      DB::commit();

      return $result;
    }

    public function updateAdminData($id, $data)
    {
        try {
            DB::beginTransaction();

            // Validasi input data
            $validator = Validator::make($data, [
                'hub_id' => 'required|integer',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|phone_number',
                'province_id' => 'required|exists:provinces,id',
                'regency_id' => 'required|exists:regencies,id',
                'district_id' => 'required|exists:districts,id',
                'full_address' => 'required|string|max:255',
                'profile_img' => 'required|string|max:255'
            ], [
                'hub_id.required' => 'ID Hub wajib diisi.',
                'hub_id.integer' => 'ID Hub harus berupa angka.',
                'first_name.required' => 'Nama depan wajib diisi.',
                'first_name.string' => 'Nama depan harus berupa teks.',
                'first_name.max' => 'Nama depan maksimal 255 karakter.',
                'last_name.required' => 'Nama belakang wajib diisi.',
                'last_name.string' => 'Nama belakang harus berupa teks.',
                'last_name.max' => 'Nama belakang maksimal 255 karakter.',
                'phone_number.required' => 'Nomor telepon wajib diisi.',
                'phone_number.phone_number' => 'Nomor telepon tidak valid.',
                'province_id.required' => 'Provinsi wajib dipilih.',
                'province_id.exists' => 'Provinsi tidak ditemukan.',
                'regency_id.required' => 'Kabupaten/Kota wajib dipilih.',
                'regency_id.exists' => 'Kabupaten/Kota tidak ditemukan.',
                'district_id.required' => 'Kecamatan wajib dipilih.',
                'district_id.exists' => 'Kecamatan tidak ditemukan.',
                'full_address.required' => 'Alamat lengkap wajib diisi.',
                'full_address.string' => 'Alamat lengkap harus berupa teks.',
                'profile_img.required' => 'URL profil wajib diisi.',
                'profile_img.string' => 'URL profil harus berupa teks.',
                'profile_img.max' => 'URL profil maksimal 255 karakter.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            if (str_starts_with($data['phone_number'], '08')) {
                $data['phone_number'] = '62' . substr($data['phone_number'], 1);
            }

            $admin = $this->mainRepository->find($id);
            if (!$admin) {
                throw new Exception("Admin dengan ID {$id} tidak ditemukan.");
            }

            $this->mainRepository->update($id, $data);

            $updatedAdmin = $this->mainRepository->find($id);

            DB::commit();
            
            return $updatedAdmin;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
    
    public function deleteAdminData($id)
    {
        DB::beginTransaction();

        try {
            $result = $this->mainRepository->delete($id);

            if (!$result) {
                throw new InvalidArgumentException('Unable to delete data. Admin not found.');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Error deleting admin data: " . $e->getMessage());
            throw new InvalidArgumentException('Failed to delete admin data.');
        }

        DB::commit();

        return $result;
    }
}
