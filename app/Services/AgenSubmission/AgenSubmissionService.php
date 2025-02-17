<?php

namespace App\Services\AgenSubmission;

use LaravelEasyRepository\BaseService;

interface AgenSubmissionService extends BaseService{

    public function getAllAgenSubmissionWithSearch($request);
    

    public function storeAgenSubmission($dataAgenSub);
    
    public function confirmAgenRegistration($submissionId);
    
}
