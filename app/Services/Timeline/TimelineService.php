<?php

namespace App\Services\Timeline;

use LaravelEasyRepository\BaseService;

interface TimelineService extends BaseService
{

    public function getTimeline($search);
    public function showTimelineWithParcelId($id);
    public function storeTimeline($timelinedata);
    public function updateTimeline($resi, array $timelineData);

}
