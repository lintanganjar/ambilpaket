<?php

namespace App\Http\Controllers\Customer\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\MerchRequest\MerchRequestService;

class ClaimHistoryController extends Controller
{
    private $merchRequestService;

    public function __construct(
        MerchRequestService $merchRequestService,
    ) {
        $this->merchRequestService = $merchRequestService;
    }

    public function index(Request $request)
    {
        $result = $this->merchRequestService->getAllRequestMerchWithSearch($request);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function show($id)
    {
        $result = $this->merchRequestService->getDetailRequestMerch($id);
        // return view('',['profile'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }
}
