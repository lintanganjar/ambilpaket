<?php

namespace App\Services\Admin;

use LaravelEasyRepository\BaseService;

interface AdminService extends BaseService{

    public function getAllAdminWithSearch($request);
    public function getAdminDetail($id);
    public function storeAdminData($dataAdmin);
    public function updateAdminData($id,$data);
    public function deleteAdminData($id);
}
