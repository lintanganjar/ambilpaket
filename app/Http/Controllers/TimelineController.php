<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Timeline\TimelineService;
use Exception;
use InvalidArgumentException;

class TimelineController extends Controller
{
    protected $timelineService;

    public function __construct(TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }

    // Fungsi untuk menampilkan data timeline berdasarkan pencarian
    public function index(Request $request)
    {
        $search = $request->query('search', '');

        try {
            $timeline = $this->timelineService->getTimeline($search);
            return response()->json($timeline, 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unable to fetch timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Fungsi untuk menyimpan data timeline baru
    public function store(Request $request)
    {
        $timelinedata = $request->only(['parcel_id', 'date', 'detail']);

        try {
            $timeline = $this->timelineService->storeTimeline($timelinedata);
            return response()->json($timeline, 201);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unable to store timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Fungsi untuk memperbarui data timeline berdasarkan resi_number
    public function update(Request $request, $resi)
    {
        $timelineData = $request->only(['date', 'detail']);

        try {
            $timeline = $this->timelineService->updateTimeline($resi, $timelineData);
            return response()->json($timeline, 200);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unable to update timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
