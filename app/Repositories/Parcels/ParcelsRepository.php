<?php

namespace App\Repositories\Parcels;

use LaravelEasyRepository\Repository;

interface ParcelsRepository extends Repository{
    public function getAllWithSearch($request);
    public function getByResi($resi);
    public function getById($id);
    public function getParcelsByStatus(string $status, ?string $search);
    public function update($id, array $data);
    public function updateTimelineParcelByResi($resi, array $timelineData);
    public function insertParcel($data);
    public function getParcelsForChartThisYear(?string $StartDate, ?string $EndDate);
    public function newParcel($data);
}
