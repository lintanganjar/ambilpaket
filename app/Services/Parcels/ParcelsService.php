<?php

namespace App\Services\Parcels;

use GuzzleHttp\Psr7\Request;
use LaravelEasyRepository\BaseService;

interface ParcelsService extends BaseService
{
    public function getAllWithSearch($request);
    public function getByResi($resi);
    public function getOngoingParcels($search);
    public function getSuccessfulParcels($search);
    public function getFailedParcels($search);
    public function getCourierAssignmentsHistory($courierId, $search);
    public function insertParcel(array $data);
    public function updateParcel($id, array $data);
    public function deleteParcel($id);
    public function updateTimeline($resi, array $timelineData);
    public function assignCourierToParcel(array $parcelIds, $courierId, $statusReason);
    public function markParcelArrived($request);
    public function markParcelDispatched($parcelId);
    public function getParcelsForChartThisYear(?string $StartDate, ?string $EndDate);
    public function newParcel(array $data);
}