<?php

namespace App\Http\Controllers\UMKM\Web;

use App\Http\Controllers\Controller;
use App\Services\ParcelAssignment\ParcelAssignmentService;
use App\Services\Parcels\ParcelsService;
use App\Services\Rate\RateService;
use App\Services\Timeline\TimelineService;
use Illuminate\Http\Request;
use Exception;

class RiwayatPengirimanController extends Controller
{
    private $parcelsService, $timelineService, $rateService, $parcelAssignmentService;

    public function __construct(
        ParcelsService $parcelsService,
        TimelineService $timelineService,
        RateService $rateService,
        ParcelAssignmentService $parcelAssignmentService
    ) {
        $this->parcelsService = $parcelsService;
        $this->timelineService = $timelineService;
        $this->rateService = $rateService;
        $this->parcelAssignmentService = $parcelAssignmentService;
    }

    public function index(Request $request)
    {
        $request->get('search', null);
        $parcels = $this->parcelsService->getAllWithSearch($request);

        if ($parcels->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data yang ditemukan'
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $parcels
        ]);
    }

    public function show($resi)
    {
        $parcel = $this->parcelsService->getByResi($resi);
        if (isset($parcel[0]['code'])) {
            if ($parcel[0]['code']==200){
                foreach ($parcel[0]['timeline'] as $timeline) {
                    $timeline['parcel_id'] = $parcel[1]['id'];
                    try {
                        $timeline = $this->timelineService->storeTimeline($timeline);
                    } catch (Exception $e) {
                        return response()->json([
                            'message' => $e->getMessage(),
                        ], 400);
                    }
                }
            }
            $timelineParcel = $this->timelineService->showTimelineWithParcelId($parcel[1]['id']);
            if (!$parcel) {
                return response()->json(['message' => 'Parcel not found'], 404);
            }
            return ['data parcel' => $parcel[1], 'data Timeline' => $timelineParcel];
        } else {
            $parcelAssignment = $this->parcelAssignmentService->findById($parcel->id);
            $parcel['kurir_id'] = $parcelAssignment->kurir_id;
            $timelineParcel = $this->timelineService->showTimelineWithParcelId($parcel->id);
            if (!$parcel) {
                return response()->json(['message' => 'Parcel not found'], 404);
            }
            return ['data parcel' => $parcel, 'data timeline' => $timelineParcel];
        }
    }

    public function rate(Request $request)
    {
        $data = $request->all();

        try {
            $rate = $this->rateService->rating($data);
            return response()->json($rate, 201);
        } catch (Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 400);
        }
    }

    public function updateRate(Request $request, $id)
    {
        $data = $request->all();

        try {
            $rate = $this->rateService->updateRating($id, $data);
            return response()->json($rate, 200);
        } catch (Exception $e) {
            return response()->json([
               'message' => $e->getMessage()
            ], 400);
        }
    }
}