<?php

namespace App\Repositories\Hubs;

use LaravelEasyRepository\Repository;

interface HubsRepository extends Repository{

    public function getAllHubWithSearch($request);
    public function getHubDetail($id);
}
