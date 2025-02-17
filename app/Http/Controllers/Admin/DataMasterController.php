<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Hubs\HubsService;
use Illuminate\Http\Request;

class DataMasterController extends Controller
{
    protected $hubsService;
    public function __construct(HubsService $hubsService)
    {
        $this->hubsService =  $hubsService;
    }

}
