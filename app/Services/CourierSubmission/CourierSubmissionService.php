<?php

namespace App\Services\CourierSubmission;

use LaravelEasyRepository\BaseService;

interface CourierSubmissionService extends BaseService{

    public function storeCourierSubmission($dataCourierSub);
    
    public function confirmCourierRegistration($submissionId);
}