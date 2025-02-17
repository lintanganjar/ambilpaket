<?php

namespace App\Services\PickupSchedule;

use LaravelEasyRepository\Service;
use App\Repositories\PickupSchedule\PickupScheduleRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;

class PickupScheduleServiceImplement extends Service implements PickupScheduleService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PickupScheduleRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllPickupScheduleWithSearch($request)
    {
      try {
          return $this->mainRepository->getAllWithSearch($request);
      } catch (Exception $e) {
          throw new Exception($e->getMessage());
      }
    }

    public function getJadwalPickupAgenByArea($adminHubArea)
    {
        try {
            // Mengambil data pengajuan pick-up berdasarkan area yang diberikan
            return $this->mainRepository->getJadwalPickupAgenByArea($adminHubArea);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function storePickupSchedule($data)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($data, [
                'request_id' => 'required|exists:pick_up_request,id',
                'agen_id' => 'required|exists:agens,id',
                'customer_umkm_id' => 'required|exists:customer_umkms,id',
            ], [
                'request_id.required' => 'ID Permintaan wajib diisi.',
                'request_id.exists' => 'Permintaan tidak ditemukan.',
                'agen_id.required' => 'ID Agen wajib diisi.',
                'agen_id.exists' => 'Agen tidak ditemukan.',
                'customer_umkm_id.required' => 'ID Customer UMKM wajib diisi.',
                'customer_umkm_id.exists' => 'Customer UMKM tidak ditemukan.',
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storePickupSchedule($data);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
