<?php

namespace App\Repositories\Superadmin;

use LaravelEasyRepository\Repository;

interface SuperadminRepository extends Repository{

    public function getDetailSuperadmin($id);

    public function storeSuperadminData($dataSuperadmin);
}
