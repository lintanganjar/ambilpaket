<?php

namespace App\Services\Superadmin;

use LaravelEasyRepository\BaseService;

interface SuperadminService extends BaseService{

    public function getSuperadminDetail($id);

    public function storeSuperadminData($dataSuperadmin);

    public function updateSuperadminData($id, $data);
}
