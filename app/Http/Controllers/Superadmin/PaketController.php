<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Parcels\ParcelsService;

class PaketController extends Controller
{
    protected $parcelsService;

    public function __construct(ParcelsService $parcelsService)
    {
        $this->parcelsService = $parcelsService;
    }

    /**
     * Paket Masuk
     */
    public function paketMasuk(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'parcel_id' => 'required|exists:parcels,id', // Parcel ID harus ada di tabel parcels
        ]);

        try {
            // Panggil service untuk menandai paket masuk
            $response = $this->parcelsService->markParcelArrived($request);

            return $response; // Response JSON dari service
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menandai paket masuk.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Paket Keluar
     */
    public function paketKeluar(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'parcel_id' => 'required|exists:parcels,id', // Parcel ID harus ada di tabel parcels
        ]);

        try {
            // Panggil service untuk menandai paket keluar
            $response = $this->parcelsService->markParcelDispatched($request);

            return $response; // Response JSON dari service
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menandai paket keluar.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Paket Berlangsung
     */
    public function paketBerlangsung(Request $request)
    {
        $parcels = $this->parcelsService->getOngoingParcels($request->search);

        return response()->json([
            'message' => 'Daftar paket berlangsung.',
            'data' => $parcels,
        ], 200);
    }

    /**
     * Paket Berhasil
     */
    public function paketBerhasil(Request $request)
    {
        $parcels = $this->parcelsService->getSuccessfulParcels($request->search);

        return response()->json([
            'message' => 'Riwayat paket berhasil.',
            'data' => $parcels,
        ], 200);
    }

    /**
     * Paket Gagal
     */
    public function paketGagal(Request $request)
    {
        $parcels = $this->parcelsService->getFailedParcels($request->search);

        return response()->json([
            'message' => 'Riwayat paket gagal.',
            'data' => $parcels,
        ], 200);
    }

    /**
     * Penugasan Kurir
     */
    public function penugasanKurir(Request $request)
    {
        $validated = $request->validate([
            'parcel_ids' => 'required|array|min:1',
            'parcel_ids.*' => 'exists:parcels,id', // Validasi ID parcel valid
            'courier_id' => 'required|exists:couriers,id', // Validasi ID kurir valid
            'status_reason' => 'nullable|string',  // Validasi status_reason
        ]);

        // Ambil status_reason dari request, jika tidak ada maka diberikan nilai default
        $statusReason = $validated['status_reason'] ?? 'Tidak ada alasan';  // Nilai default jika tidak diisi

        try {
            // Call the service method to assign the courier to the parcel
            $assignment = $this->parcelsService->assignCourierToParcel(
                $validated['parcel_ids'],  // Parameter pertama
                $validated['courier_id'],   // Parameter kedua
                $statusReason               // Parameter ketiga
            );
            // Return success response
            return response()->json([
                'message' => 'Penugasan kurir berhasil dilakukan.',
                'data' => $assignment,
            ], 200);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'message' => 'Gagal melakukan penugasan kurir.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Riwayat Penugasan Kurir
     */
    public function riwayatPenugasanKurir(Request $request)
    {
        $assignments = $this->parcelsService->getCourierAssignmentsHistory($request->courier_id, $request->search);

        if ($assignments->isEmpty()) {
            $errorMessage = 'Data tidak ditemukan. ';
            if (!$request->courier_id) {
                $errorMessage .= 'ID kurir tidak diberikan.';
            } elseif (!$request->search) {
                $errorMessage .= 'Parameter pencarian tidak diberikan.';
            } else {
                $errorMessage .= 'Pastikan ID kurir dan parameter pencarian sesuai.';
            }

            return response()->json([
                'message' => $errorMessage,
                'data' => [],
            ], 404);
        }

        return response()->json([
            'message' => 'Riwayat penugasan kurir.',
            'data' => $assignments,
        ], 200);
    }
}
