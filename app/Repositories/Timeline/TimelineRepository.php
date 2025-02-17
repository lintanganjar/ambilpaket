<?php

namespace App\Repositories\Timeline;

use LaravelEasyRepository\Repository;

interface TimelineRepository extends Repository{

    public function getTimeline($search);
    public function showTimelineWithParcelId($id);
    public function insertTimeline($data);
    public function updateTimelineByResi($resi, array $timelineData);

}
