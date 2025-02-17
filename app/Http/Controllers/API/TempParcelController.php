<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Ongkir\OngkirService;
use App\Services\Price\PriceService;
use App\Services\TempParcel\TempParcelService;
use App\Services\TempParcelSender\TempParcelSenderService;
use App\Services\TempParcelReceiver\TempParcelReceiverService;

class TempParcelController extends \App\Http\Controllers\Controller
{
    private $tempParcelService, $tempParcelReceiverService, $tempParcelSenderService, $priceService;

    public function __construct(
        TempParcelService $tempParcelService,
        TempParcelReceiverService $tempParcelReceiverService,
        TempParcelSenderService $tempParcelSenderService,
        PriceService $priceService,
    ) {
        $this->tempParcelService = $tempParcelService;
        $this->tempParcelReceiverService = $tempParcelReceiverService;
        $this->tempParcelSenderService = $tempParcelSenderService;
        $this->priceService = $priceService;
    }

    public function cekPriceService(Request $request)
    {

        try {
            $price = $this->priceService->getAllWithSearch($request);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Harga ongkir berhasil ditemukan',
                'data' => $price,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Tidak dapat memeriksa harga, harap periksa inputan Anda',
                'error' => $e->getMessage(),
            ], 400);
        }
    }

    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->get('search', null);
        if ($user->role == "Customer" || $user->role == "UMKM") {
            $tempParcels = $this->tempParcelService->getAllTempParcelWithSearch($request);

            if ($tempParcels->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'code' => 200,
                    'data' => [],
                ], 200);
            }

            $tempParcels = $tempParcels->map(function ($parcel) {
                $parcel->receiver = $this->tempParcelReceiverService->getTempParcelReceiverDetail($parcel->id);
                $parcel->sender = $this->tempParcelSenderService->getTempParcelSenderDetail($parcel->id);
                return $parcel;
            })->values();

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil ditemukan',
                'data' => $tempParcels,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'code' => 403,
                'message' => 'Role pengguna tidak valid.',
            ], 403);
        }
    }

    public function detail($id)
    {
        $tempParcels = $this->tempParcelService->getTempParcelDetail($id);

        if (!$tempParcels) {
            return response()->json([
                'success' => false,
                'code' => 200,
                'data' => [],
            ], 200);
        }

        $tempParcelReceiver = $this->tempParcelReceiverService->getTempParcelReceiverDetail($tempParcels->id);
        $tempParcelSender = $this->tempParcelSenderService->getTempParcelSenderDetail($tempParcels->id);

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data berhasil ditemukan',
            'data' => array_merge(
                $tempParcels->toArray(),
                ['receiver' => $tempParcelReceiver->toArray()],
                ['sender' => $tempParcelSender->toArray()]
            ),
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'price',
            'item_type',
            'item_name',
            'amount',
            'weight',
            'item_height',
            'item_width',
            'item_length',
            'note',
            'service_price_id',
            'estimation_date',
        ]);

        try {
            $tempParcels = $this->tempParcelService->storeTempParcelData($data);

            $dataReceiver = array_merge(
                $request->only([
                    'reciever_first_name',
                    'reciever_last_name',
                    'reciever_phone_number',
                    'reciever_email',
                    'reciever_province_id',
                    'reciever_regency_id',
                    'reciever_district_id',
                    'reciever_postal_code',
                    'reciever_full_address',
                    'reciever_latitude',
                    'reciever_longitude',
                ]),
                ['parcel_id' => $tempParcels->id]
            );

            $dataSender = array_merge(
                $request->only([
                    'sender_first_name',
                    'sender_last_name',
                    'sender_phone_number',
                    'sender_email',
                    'sender_province_id',
                    'sender_regency_id',
                    'sender_district_id',
                    'sender_postal_code',
                    'sender_full_address',
                ]),
                ['parcel_id' => $tempParcels->id]
            );

            $tempParcelReceiver = $this->tempParcelReceiverService->storeTempParcelReceiverData($dataReceiver);

            $tempParcelSender = $this->tempParcelSenderService->storeTempParcelSenderData($dataSender);

            return response()->json([
                'success' => true,
                'code' => 201,
                'message' => 'Data berhasil disimpan',
                'data' => array_merge(
                    $tempParcels->toArray(),
                    ['receiver' => $tempParcelReceiver->toArray()],
                    ['sender' => $tempParcelSender->toArray()]
                ),
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'customer_id',
            'customer_umkm_id',
            'price',
            'item_type',
            'item_name',
            'amount',
            'weight',
            'item_height',
            'item_width',
            'item_length',
            'note',
            'service_price_id',
            'estimation_date',
        ]);

        try {
            $tempParcels = $this->tempParcelService->updateTempParcelData($id, $data);

            $dataReceiver = $request->only([
                'reciever_first_name',
                'reciever_last_name',
                'reciever_phone_number',
                'reciever_email',
                'reciever_province_id',
                'reciever_regency_id',
                'reciever_district_id',
                'reciever_postal_code',
                'reciever_full_address',
                'reciever_latitude',
                'reciever_longitude',
            ]);

            $dataSender = $request->only([
                'sender_first_name',
                'sender_last_name',
                'sender_phone_number',
                'sender_email',
                'sender_province_id',
                'sender_regency_id',
                'sender_district_id',
                'sender_postal_code',
                'sender_full_address',
            ]);

            $tempParcelReceiver = $this->tempParcelReceiverService->updateTempParcelReceiverData($id, $dataReceiver);

            $tempParcelSender = $this->tempParcelSenderService->updateTempParcelSenderData($id, $dataSender);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil diperbarui',
                'data' => [
                    'parcel' => $tempParcels,
                    'receiver' => $tempParcelReceiver,
                    'sender' => $tempParcelSender,
                ],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal memperbarui data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $tempParcelReceiver = $this->tempParcelReceiverService->deleteTempParcelReceiverData($id);

            $tempParcelSender = $this->tempParcelSenderService->deleteTempParcelSenderData($id);

            $tempParcels = $this->tempParcelService->deleteTempParcelData($id);

            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Data berhasil dihapus',
                'data' => [
                    'parcel' => $tempParcels,
                    'receiver' => $tempParcelReceiver,
                    'sender' => $tempParcelSender,
                ],
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => 'Gagal menghapus data',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
