<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\utils\CityList;

class CityController extends Controller
{
    public function getCityList()
    {
        return CityList::getCity();
    }
}
