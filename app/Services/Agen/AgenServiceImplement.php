<?php

namespace App\Services\Agen;

use LaravelEasyRepository\Service;
use App\Repositories\Agen\AgenRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class AgenServiceImplement extends Service implements AgenService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(AgenRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getAllAgenWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllAgenWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAgenDetail($id)
    {
        try {
            return $this->mainRepository->getDetailAgen($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getAgenDetailByRegencyId($regencyId)
    {
        try {
            return $this->mainRepository->getDetailAgenByRegencyId($regencyId);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Mengambil riwayat top up saldo agen
    public function getTopUpHistory()
    {
        try {
            return $this->mainRepository->getTopUpHistory();
        } catch (Exception $e) {
            throw new Exception('Gagal mengambil riwayat top up saldo: ' . $e->getMessage());
        }
    }

    public function storeAgenData($dataAgen)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataAgen, [
                'partnership_id' => 'nullable|exists:partnerships,id',
                'submission_id' => 'required|exists:agen_submissions,id',
                'user_id' => 'required|unique:agens,user_id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'nullable|string|max:255',
                'phone_number' => 'required|phone_number',
                'province_id' => 'nullable|exists:provinces,id',
                'regency_id' => 'nullable|exists:regencies,id',
                'district_id' => 'nullable|exists:districts,id',
                'full_address' => 'required|string',
                'building_type' => 'nullable|string|max:255',
                'building_status' => 'nullable|string|max:255',
                'location' => 'nullable|string|max:255',
                'latitude' => 'nullable|string|max:255',
                'longitude' => 'nullable|string|max:255',
                'balance' => 'nullable|integer',
                'bank_name' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'profile_img' => 'nullable|string|max:255'
            ], [
                'partnership_id' => [
                    'exists' => 'Partnership tidak ditemukan.',
                ],
                'submission_id' => [
                    'required' => 'Submission ID wajib diisi.',
                    'exists' => 'Submission ID tidak ditemukan.',
                ],
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
                    'phone_number' => 'Harap Masukkan Nomer Telepon yang valid',
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
                    'required' => 'Alamat lengkap wajib diisi.',
                    'string' => 'Alamat lengkap harus berupa teks.',
                ],
                'building_type' => [
                    'string' => 'Tipe bangunan harus berupa teks.',
                    'max' => 'Tipe bangunan maksimal 255 karakter.',
                ],
                'building_status' => [
                    'string' => 'Status bangunan harus berupa teks.',
                    'max' => 'Status bangunan maksimal 255 karakter.',
                ],
                'location' => [
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
                'balance' => [
                    'integer' => 'Saldo harus berupa angka.',
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
                'profile_img' => [
                    'string' => 'URL profil harus berupa teks.',
                    'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storeAgenData($dataAgen);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updateAgenData($id, $data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'partnership_id' => 'required|exists:partnerships,id',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|phone_number',
                'province_id' => 'required|exists:provinces,id',
                'regency_id' => 'required|exists:regencies,id',
                'district_id' => 'required|exists:districts,id',
                'full_address' => 'required|string',
                'building_type' => 'required|string|max:255',
                'building_status' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'latitude' => 'required|string|max:255',
                'longitude' => 'required|string|max:255',
                'balance' => 'required|integer',
                'bank_name' => 'required|string|max:255',
                'account_name' => 'required|string|max:255',
                'account_number' => 'required|string|max:255',
                'profile_img' => 'required|string|max:255'
            ], [
                'partnership_id' => [
                    'required' => 'ID Kemitraan wajib diisi.',
                    'exists' => 'ID Kemitraan tidak ditemukan.',
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
                    'phone_number' => 'Harap Masukkan Nomer Telepon yang valid'
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
                    'required' => 'Latitude wajib diisi.',
                    'string' => 'Latitude harus berupa teks.',
                    'max' => 'Latitude maksimal 255 karakter.',
                ],
                'longitude' => [
                    'required' => 'Longitude wajib diisi.',
                    'string' => 'Longitude harus berupa teks.',
                    'max' => 'Longitude maksimal 255 karakter.',
                ],
                'balance' => [
                    'required' => 'Saldo wajib diisi.',
                    'integer' => 'Saldo harus berupa angka.',
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
                'profile_img' => [
                    'required' => 'URL profil wajib diisi.',
                    'string' => 'URL profil harus berupa teks.',
                    'max' => 'URL profil maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            if (str_starts_with($data['phone_number'], '08')) {
                $data['phone_number'] = '62' . substr($data['phone_number'], 1);
            }

            $agen = $this->mainRepository->find($id);
            if (!$agen) {
                throw new Exception("Agen with ID {$id} not found");
            }

            $result = $this->mainRepository->update($id, $data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    // Memperbarui status pengajuan upgrade kemitraan agen
    public function updatePartnershipStatus($id, $status)
    {
        try {
            return $this->mainRepository->updatePartnershipStatus($id, $status);
        } catch (Exception $e) {
            throw new Exception('Gagal memperbarui status kemitraan: ' . $e->getMessage());
        }
    }

    // Memperbarui status pengajuan top up saldo agen
    public function updateTopUpStatus($id, $status)
    {
        try {
            return $this->mainRepository->updateTopUpStatus($id, $status);
        } catch (Exception $e) {
            throw new Exception('Gagal memperbarui status pengajuan top up saldo: ' . $e->getMessage());
        }
    }
}
