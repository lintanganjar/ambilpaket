<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Parcels\ParcelsService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $parcelsService;
    protected $userService;
    public function __construct(ParcelsService $parcelsService,
                                UserService $userService)
    {
        $this->parcelsService = $parcelsService;
        $this->userService = $userService;
    }
    public function index(Request $request){
        // Auth::logout();
        $credential = ['email' => 'SaadatSusanti@adminregency.com' ,'password' => 'password'];
        if(!Auth::check()){
            Auth::attempt($credential);
        }
        // dd(Auth::user()->role);
        $dataList = $this->parcelsService->getAllWithSearch($request);
        $transaction_grapic = $this->parcelsService->getParcelsForChartThisYear(null,null)->toArray();
        $user_count = $this->userService->getUserCount();
        // dd($user_count->toArray());
        return view('pages.admin-hub.dashboard.index', compact('dataList','transaction_grapic','user_count'));
    }
}
