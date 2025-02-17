<?php

namespace App\Repositories\CourierSubmissions;

use LaravelEasyRepository\Repository;

interface CourierSubmissionsRepository extends Repository{

    public function storeCourierSubmission($data);
}
