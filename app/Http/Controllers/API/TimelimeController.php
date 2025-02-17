<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\Timeline\TimelineService;

class TimelimeController extends \App\Http\Controllers\Controller
{
    protected $timelineService;

    public function __construct(TimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }
    
    public function index(Request $request)
    {
        $search = $request->query('search', '');

        try {
            $timeline = $this->timelineService->getTimeline($search);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil ditemukan',
                'data' => $timeline,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Unable to fetch timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $timeline = $this->timelineService->showTimelineWithParcelId($id);

            if ($timeline->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'code' => 200,
                    'data' => [],
                ], 200);
            }

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil ditemukan',
                'data' => $timeline,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Unable to fetch timeline data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
