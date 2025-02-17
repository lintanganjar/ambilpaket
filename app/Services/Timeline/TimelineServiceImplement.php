<?php

namespace App\Services\Timeline;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Timeline\TimelineRepository;

class TimelineServiceImplement extends Service implements TimelineService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(TimelineRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getTimeline($search)
    {
        return $this->mainRepository->getTimeline($search);
    }
    public function showTimelineWithParcelId($id)
    {
        return $this->mainRepository->showTimelineWithParcelId($id);
    }

    public function storeTimeline($timelinedata)
    {
        try {
            // Validasi data input
            $validator = Validator::make($timelinedata, [
                'parcel_id' => 'required|integer',
                'date' => 'required|date',
                'detail' => 'required|string|max:255',
            ], [
                'parcel_id' => [
                    'required' => 'ID Paket wajib diisi.',
                    'integer' => 'ID Paket harus berupa angka.',
                ],
                'date' => [
                    'required' => 'Tanggal wajib diisi.',
                    'date' => 'Tanggal tidak valid.',
                ],
                'detail' => [
                    'required' => 'Detail wajib diisi.',
                    'string' => 'Detail harus berupa teks.',
                    'max' => 'Detail maksimal 255 karakter.',
                ],
            ]);

            // Jika validasi gagal, lempar exception dengan pesan error pertama
            if ($validator->fails()) {
                throw new InvalidArgumentException($validator->errors()->first());
            }

            // Insert data ke dalam tabel timeline
            return $this->mainRepository->insertTimeline($timelinedata);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Something went wrong. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function updateTimeline($resi, array $timelineData)
  {
    return $this->mainRepository->updateTimelineByResi($resi, $timelineData);
  }
}
