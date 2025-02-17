<?php

namespace App\Services\Hubs;

use LaravelEasyRepository\BaseService;

interface HubsService extends BaseService{

    public function getAllHubWithSearch($request);
    public function getHubDetail($id);
    public function storeHubData($data);
    public function updateHubData($id,$data);
    public function deleteHubData($id);
}
