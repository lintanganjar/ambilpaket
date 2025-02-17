<?php

namespace App\Services\ParcelAssignment;

use LaravelEasyRepository\BaseService;

interface ParcelAssignmentService extends BaseService{

    public function getAllWithSearch($request);    
    public function getDetailByResiNumber($resiNumber);
    public function findById($id);
    public function insertParcelAssignment(array $data);
    public function updateParcelAssignment($id, array $data);
    public function deleteParcelAssignment($id);
}
