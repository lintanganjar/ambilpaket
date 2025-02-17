<?php

namespace App\Services\Merch;

use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Merch\MerchRepository;
use Illuminate\Support\Facades\DB;
use Exception;

class MerchServiceImplement extends Service implements MerchService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;

    public function __construct(MerchRepository $mainRepository)
    {
        $this->mainRepository = $mainRepository;
    }

    public function getAllMerchWithSearch($request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'point_range' => 'nullable|string|in:all,0-150,150-300,300-600,>600',
                'name' => 'nullable|string|max:255'
            ], [
                'point_range.in' => 'Range poin tidak valid.',
                'name' => [
                    'string' => 'Nama harus berupa teks.',
                    'max' => 'Nama maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            return $this->mainRepository->getAllMerchWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getMerchDetail($id)
    {
        try {
            return $this->mainRepository->getDetailMerch($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getMerchHistory()
    {
        try {
            return $this->mainRepository->getMerchHistory();
        } catch (Exception $e) {
            throw new Exception('Gagal mengambil riwayat permintaan merch: ' . $e->getMessage());
        }
    }

    public function storeMerchData($dataMerch)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataMerch, [
                'name' => 'required|string|max:255',
                'stock' => 'required|integer|min:0',
                'merchandise_img' => 'nullable|string|max:255',
                'point' => 'required|integer|min:0',
                'available' => 'boolean'
            ], [
                'name' => [
                    'required' => 'Nama merchandise wajib diisi.',
                    'string' => 'Nama merchandise harus berupa teks.',
                    'max' => 'Nama merchandise maksimal 255 karakter.',
                ],
                'stock' => [
                    'required' => 'Stok merchandise wajib diisi.',
                    'integer' => 'Stok merchandise harus berupa angka.',
                    'min' => 'Stok merchandise minimal 0.',
                ],
                'merchandise_img' => [
                    'string' => 'URL gambar merchandise harus berupa teks.',
                    'max' => 'URL gambar merchandise maksimal 255 karakter.',
                ],
                'point' => [
                    'required' => 'Poin merchandise wajib diisi.',
                    'integer' => 'Poin merchandise harus berupa angka.',
                    'min' => 'Poin merchandise minimal 0.',
                ],
                'available' => [
                    'boolean' => 'Status ketersediaan harus berupa boolean (true/false).',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storeMerchData($dataMerch);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function updateMerchData($id, $dataMerch)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($dataMerch, [
                'name' => 'nullable|string|max:255',
                'stock' => 'nullable|integer|min:0',
                'merchandise_img' => 'nullable|string|max:255',
                'point' => 'nullable|integer|min:0',
                'available' => 'boolean'
            ], [
                'name' => [
                    'string' => 'Nama merchandise harus berupa teks.',
                    'max' => 'Nama merchandise maksimal 255 karakter.',
                ],
                'stock' => [
                    'integer' => 'Stok merchandise harus berupa angka.',
                    'min' => 'Stok merchandise minimal 0.',
                ],
                'merchandise_img' => [
                    'string' => 'URL gambar merchandise harus berupa teks.',
                    'max' => 'URL gambar merchandise maksimal 255 karakter.',
                ],
                'point' => [
                    'integer' => 'Poin merchandise harus berupa angka.',
                    'min' => 'Poin merchandise minimal 0.',
                ],
                'available' => [
                    'boolean' => 'Status ketersediaan harus berupa boolean (true/false).',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $merch = $this->mainRepository->getDetailMerch($id);
            if (!$merch) {
                throw new Exception("Merchandise with ID {$id} not found");
            }

            $result = $this->mainRepository->update($id, $dataMerch);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function deleteMerch($id)
    {
        try {
            DB::beginTransaction();

            $merch = $this->mainRepository->getDetailMerch($id);
            if (!$merch) {
                throw new Exception("Merchandise with ID {$id} not found");
            }

            $result = $this->mainRepository->deleteMerch($id);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
