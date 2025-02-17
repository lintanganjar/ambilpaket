<?php

namespace App\Repositories\AgenSubmission;

use LaravelEasyRepository\Repository;

interface AgenSubmissionRepository extends Repository{
    public function getAllAgenSubmissionWithSearch($request);
    public function storeAgenSubmission($dataAgenSub);
}
