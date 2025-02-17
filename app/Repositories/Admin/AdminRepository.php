<?php

namespace App\Repositories\Admin;

use LaravelEasyRepository\Repository;

interface AdminRepository extends Repository{

    public function getAllAdminWithSearch($request);
    public function getAdminDetail($id);
    public function storeAdminData($dataAdmin);
}
