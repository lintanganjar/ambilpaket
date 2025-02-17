<?php

namespace App\Services\Umkm;

use LaravelEasyRepository\Service;
use App\Repositories\Umkm\UmkmRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class UmkmServiceImplement extends Service implements UmkmService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(UmkmRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getAllUmkmWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllUmkmWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getUmkmDetail($id)
    {
        try {
            return $this->mainRepository->getDetailUmkm($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
    /**
     * Mendapatkan data UMKM yang berada di area yang sama dengan Admin-HUB
     * 
     * @param array $adminHubArea
     * @return mixed
     */
    public function getUMKMsInSameArea($adminHubArea)
    {
        try {
            // Mengambil data UMKM berdasarkan area yang diberikan
            return $this->mainRepository->getUMKMsByArea($adminHubArea);
        } catch (Exception $e) {
            throw new Exception('Unable to retrieve UMKM in the same area.');
        }
    }

    public function storeUmkmData($dataUmkm)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataUmkm, [
                'user_id' => 'required|unique:customer_umkms,user_id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'required|phone_number',
                'company_name' => 'nullable|string|max:255',
                'product_type' => 'nullable|string|max:255',
                'province_id' => 'nullable|exists:provinces,id',
                'regency_id' => 'nullable|exists:regencies,id',
                'district_id' => 'nullable|exists:districts,id',
                'full_address' => 'nullable|string',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'parcel_average_per_day' => 'nullable|integer',
                'pickup_activation' => 'nullable|boolean',
                'days_of_pickup' => 'nullable|array',
                'days_of_pickup.*' => 'string',
                'time_of_pickup' => 'nullable|date_format:H:i',
                'profile_img' => 'nullable|string|max:255',
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
                'company_name' => [
                    'string' => 'Nama perusahaan harus berupa teks.',
                    'max' => 'Nama perusahaan maksimal 255 karakter.',
                ],
                'product_type' => [
                    'string' => 'Jenis produk harus berupa teks.',
                    'max' => 'Jenis produk maksimal 255 karakter.',
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
                ],
                'latitude' => [
                    'string' => 'Latitude harus berupa teks.',
                    'max' => 'Latitude maksimal 255 karakter.',
                ],
                'longitude' => [
                    'string' => 'Longitude harus berupa teks.',
                    'max' => 'Longitude maksimal 255 karakter.',
                ],
                'parcel_average_per_day' => [
                    'integer' => 'Rata-rata paket per hari harus berupa angka.',
                ],
                'pickup_activation' => [
                    'boolean' => 'Aktivasi penjemputan harus berupa boolean (true/false).',
                ],
                'days_of_pickup.*' => [
                    'string' => 'Hari penjemputan harus berupa teks.',
                ],
                'time_of_pickup' => [
                    'date_format' => 'Waktu penjemputan tidak valid. Format yang benar: HH:mm.',
                ],
                'profile_img' => [
                  'string' => 'URL profil harus berupa teks.',
                  'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $dataUmkm['days_of_pickup'] = isset($dataUmkm['days_of_pickup']) ? json_encode($dataUmkm['days_of_pickup']) : null;

            $result = $this->mainRepository->storeUmkmData($dataUmkm);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updateUmkmData($id, $data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'first_name' => 'nullable|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'nullable|phone_number',
                'company_name' => 'nullable|string|max:255',
                'product_type' => 'nullable|string|max:255',
                'province_id' => 'nullable|exists:provinces,id',
                'regency_id' => 'nullable|exists:regencies,id',
                'district_id' => 'nullable|exists:districts,id',
                'full_address' => 'nullable|string',
                'point' => 'nullable|integer',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'parcel_average_per_day' => 'nullable|integer',
                'pickup_activation' => 'nullable|boolean',
                'days_of_pickup' => 'nullable|array',
                'days_of_pickup.*' => 'nullable|string',
                'time_of_pickup' => 'nullable|date_format:H:i',
                'profile_img' => 'nullable|string|max:255',
            ], [
                'first_name' => [
                    'string' => 'Nama depan harus berupa teks.',
                    'max' => 'Nama depan maksimal 255 karakter.',
                ],
                'last_name' => [
                    'string' => 'Nama belakang harus berupa teks.',
                    'max' => 'Nama belakang maksimal 255 karakter.',
                ],
                'phone_number' => [
                    'phone_number' => 'Nomor telepon tidak valid.',
                ],
                'company_name' => [
                    'string' => 'Nama perusahaan harus berupa teks.',
                    'max' => 'Nama perusahaan maksimal 255 karakter.',
                ],
                'product_type' => [
                    'string' => 'Jenis produk harus berupa teks.',
                    'max' => 'Jenis produk maksimal 255 karakter.',
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
                ],
                'point' => [
                    'integer' => 'Poin harus berupa angka.',
                ],
                'latitude' => [
                    'string' => 'Latitude harus berupa teks.',
                    'max' => 'Latitude maksimal 255 karakter.',
                ],
                'longitude' => [
                    'string' => 'Longitude harus berupa teks.',
                    'max' => 'Longitude maksimal 255 karakter.',
                ],
                'parcel_average_per_day' => [
                    'integer' => 'Rata-rata paket per hari harus berupa angka.',
                ],
                'pickup_activation' => [
                    'boolean' => 'Aktivasi penjemputan harus berupa boolean (true/false).',
                ],
                'days_of_pickup.*' => [
                    'string' => 'Hari penjemputan harus berupa teks.',
                ],
                'time_of_pickup' => [
                    'date_format' => 'Waktu penjemputan tidak valid. Format yang benar: HH:mm.',
                ],
                'profile_img' => [
                  'string' => 'URL profil harus berupa teks.',
                  'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            if (!empty($data['days_of_pickup'])) {
                $data['days_of_pickup'] = isset($data['days_of_pickup']) ? json_encode($data['days_of_pickup']) : null;
            }

            $umkm = $this->mainRepository->find($id);
            if (!$umkm) {
                throw new Exception("Umkm with ID {$id} not found");
            }

            $result = $this->mainRepository->update($id, $data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
