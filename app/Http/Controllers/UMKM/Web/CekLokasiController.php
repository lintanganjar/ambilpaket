<?php

namespace App\Http\Controllers\UMKM\Web;

use App\Http\Controllers\Controller;
use App\Services\Agen\AgenService;
use Illuminate\Http\Request;

class CekLokasiController extends Controller
{
    private $agenService;

    public function __construct(AgenService $agenService)
    {
        $this->agenService = $agenService;
    }

    public function index(Request $request)
    {
        $result = $this->agenService->getAllAgenWithSearch($request);
        //return view('', ['listAgen' => $result]);
        return response()->json([
            "success" => true,
            "code" => 200,
            "data" => $result
        ]);
    }

    public function show($id)
    {
        $result = $this->agenService->getAgenDetail($id);
        //return view('', ['agenDetail' => $result]);
        return response()->json([
            "success" => true,
            "code" => 200,
            "data" => $result
        ]);
    }
}