<?php

namespace App\Http\Controllers\Customer\Web;

use App\Http\Controllers\Controller;
use App\Services\Agen\AgenService;
use Illuminate\Http\Request;

class AgenController extends Controller
{
    private $agenService;

    public function __construct(AgenService $agenService) 
    {
        $this->agenService = $agenService;
    }

    public function index(Request $request)
    {
        $result = $this->agenService->getAllAgenWithSearch($request);
        // return view('',['listAgen'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

    public function show($id)
    {
        $result = $this->agenService->getAgenDetail($id);
        // return view('',['agenDetail'=>$result]);
        return response()->json([
            "Success" => true,
            "Code" => 200,
            "data" => $result
        ]);
    }

}
