<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Parcels\ParcelsService;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    protected $parcelsService;
    public function __construct(ParcelsService $parcelsService)
    {
        $this->parcelsService = $parcelsService;
    }
    public function masuk(Request $request)
    {
        return view('pages.admin-hub.paket.paket-masuk.index');
    }
    public function keluar(Request $request)
    {
        return view('pages.admin-hub.paket.paket-keluar.index');
    }
    public function berlangsung(Request $request)
    {
        return view('pages.admin-hub.paket.paket-berlangsung.index');
    }
    public function berhasil(Request $request)
    {
        $parcels =  $this->parcelsService->getSuccessfulParcels($request->get('search'));
        return view('pages.admin-hub.paket.paket-berhasil.index', compact('parcels'));
    }
    public function gagal(Request $request)
    {
        $parcels =  $this->parcelsService->getFailedParcels($request->get('search'));
        return view('pages.admin-hub.paket.paket-gagal.index', compact('parcels'));
    }
    public function delivery(Request $request)
    {
        return view('pages.admin-hub.paket.penugasan-kurir.index');
    }
    public function history_assigment(Request $request)
    {
        return view('pages.admin-hub.paket.riwayat-penugasan-kurir.index');
    }


}
