<?php

namespace App\Repositories\ParcelAssignment;

use LaravelEasyRepository\Repository;

interface ParcelAssignmentRepository extends Repository{
    public function getAllWithSearch($request);
    public function getDetailByResiNumber($resiNumber);
    public function findById($id);
    public function insertParcelAssignment($data);
    public function getCourierAssignmentsHistory($courierId, $search);
}
