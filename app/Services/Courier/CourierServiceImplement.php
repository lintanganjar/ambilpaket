<?php

namespace App\Services\Courier;

use LaravelEasyRepository\Service;
use App\Repositories\Courier\CourierRepository;
use App\Services\Courier\CourierService;
use Illuminate\Support\Facades\Validator;
use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;

class CourierServiceImplement extends Service implements CourierService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(CourierRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getCouriersInSameArea($adminHubArea)
    {
        try {
            // Mengambil data kurir berdasarkan area yang diberikan
            return $this->mainRepository->getCouriersByArea($adminHubArea);
        } catch (Exception $e) {
            throw new Exception('Unable to retrieve couriers in the same area.');
        }
    }

    public function getAllCouriersWithSearch($request)
    {
        return $this->mainRepository->getAllCouriersWithSearch($request);
    }
    
    public function getDetailCourier($Id)
    {
        try {
            return $this->mainRepository->getDetailCourier($Id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function storeCourierData(array $data)
    {
        $validator = Validator::make($data, [
            'user_id' => 'required|unique:couriers,user_id',
            'courier_type' => 'required|in:Delivery,Pickup',
            'first_name' => 'bail|required|string|max:255',
            'last_name' => 'bail|required|string|max:255',
            'phone_number' => 'string|phone_number',
            'gender' => 'required|in:Pria,Wanita',
            'profile_img' => 'string|max:255',
            'area_id' => 'required|exists:areas,id',
            'balance' => 'required|integer',
            'bank_name' => 'string|max:255',
            'account_name' => 'string|max:255',
            'account_number' => 'string|max:255',
        ], [
            'user_id' => [
                'required' => 'User ID wajib diisi.',
                'unique' => 'User ID sudah digunakan.',
            ],
            'courier_type' => [
                'required' => 'Tipe kurir wajib dipilih.',
                'in' => 'Tipe kurir tidak valid.',
            ],
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
            'gender' => [
                'required' => 'Jenis kelamin wajib dipilih.',
                'in' => 'Jenis kelamin tidak valid.',
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
                'required' => 'Saldo wajib diisi.',
                'integer' => 'Saldo harus berupa angka.',
            ],
            'bank_name' => [
                'string' => 'Nama bank harus berupa teks.',
                'max' => 'Nama bank maksimal 255 karakter.',
            ],
            'account_name' => [
                'string' => 'Nama pemilik rekening harus berupa teks.',
                'max' => 'Nama pemilik rekening maksimal 255 karakter.',
            ],
            'account_number' => [
                'string' => 'Nomor rekening harus berupa teks.',
                'max' => 'Nomor rekening maksimal 255 karakter.',
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();
        try {
            $result = $this->mainRepository->storeCourierData($data);
            return $result;
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }


    public function updateCourier($id, array $data)
    {
        $validator = Validator::make($data, [
            'user_id' => "nullable|unique:couriers,user_id,{$id}",
            'courier_type' => 'nullable|in:Delivery,Pickup',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'phone_number' => 'nullable|phone_number',
            'gender' => 'nullable|in:Pria,Wanita',
            'profile_img' => 'nullable|string|max:255',
            'area_id' => 'nullable|exists:areas,id',
            'balance' => 'nullable|integer',
            'bank_name' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ], [
            'user_id' => [
                'required' => 'User ID wajib diisi.',
                'unique' => 'User ID sudah digunakan.',
            ],
            'courier_type' => [
                'in' => 'Tipe kurir tidak valid.',
            ],
            'first_name' => [
                'string' => 'Nama depan harus berupa teks.',
                'max' => 'Nama depan maksimal 255 karakter.',
            ],
            'last_name' => [
                'string' => 'Nama belakang harus berupa teks.',
                'max' => 'Nama belakang maksimal 255 karakter.',
            ],
            'phone_number' => [
                'string' => 'Nomor telepon harus berupa teks.',
                'phone_number' => 'Harap Masukkan Nomer Telepon yang valid'
            ],
            'gender' => [
                'in' => 'Jenis kelamin tidak valid.',
            ],
            'profile_img' => [
                'string' => 'URL profil harus berupa teks.',
                'max' => 'URL profil maksimal 255 karakter.',
            ],
            'area_id' => [
                'exists' => 'Area tidak ditemukan.',
            ],
            'balance' => [
                'integer' => 'Saldo harus berupa angka.',
            ],
            'bank_name' => [
                'string' => 'Nama bank harus berupa teks.',
                'max' => 'Nama bank maksimal 255 karakter.',
            ],
            'account_name' => [
                'string' => 'Nama pemilik rekening harus berupa teks.',
                'max' => 'Nama pemilik rekening maksimal 255 karakter.',
            ],
            'account_number' => [
                'string' => 'Nomor rekening harus berupa teks.',
                'max' => 'Nomor rekening maksimal 255 karakter.',
            ],
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException('Validation failed: ' . implode(', ', $validator->errors()->all()));
        }

        DB::beginTransaction();
        try {
            $courier = $this->mainRepository->find($id);
            if (!$courier) {
                throw new Exception("Courier with ID {$id} not found");
            }

            $result = $this->mainRepository->update($id, $data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function deleteCourierData($id)
    {
        try {
            DB::beginTransaction();

            $courier = $this->mainRepository->find($id);
            
            if (!$courier) {
                throw new Exception("Courier with ID {$id} not found");
            }

            $this->mainRepository->delete($id);

            DB::commit();
            return ['message' => 'Courier data deleted successfully.'];
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
