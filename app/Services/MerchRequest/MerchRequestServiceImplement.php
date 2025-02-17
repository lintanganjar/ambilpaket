<?php

namespace App\Services\MerchRequest;

use LaravelEasyRepository\Service;
use App\Repositories\Merch\MerchRepository;
use App\Repositories\Parcels\ParcelsRepository;
use App\Repositories\MerchRequest\MerchRequestRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\utils\ResiNumber;
use Exception;

class MerchRequestServiceImplement extends Service implements MerchRequestService
{

    /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
    protected $mainRepository;
    protected $merchRepository;
    protected $parcelRepository;

    public function __construct(
        MerchRequestRepository $mainRepository,
        MerchRepository $merchRepository,
        ParcelsRepository $parcelRepository
    ) {
        $this->mainRepository = $mainRepository;
        $this->merchRepository = $merchRepository;
        $this->parcelRepository = $parcelRepository;
    }

    public function getAllRequestMerchWithSearch($request)
    {
        try {
            return $this->mainRepository->getAllRequestMerchWithSearch($request);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getDetailRequestMerch($id)
    {
        try {
            return $this->mainRepository->getDetailRequestMerch($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getWaitingList()
    {
        try {
            return $this->mainRepository->getWaitingList();
        } catch (Exception $e) {
            throw new Exception('Gagal mengambil data waiting list: ' . $e->getMessage());
        }
    }

    public function storeRequestMerchData($dataRequest)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($dataRequest, [
                'merchandise_id' => 'required|exists:merchandise,id',
                'amount' => 'required|integer|min:1',
                'note' => 'nullable|string|max:255'
            ], [
                'merchandise_id' => [
                    'required' => 'ID Merchandise wajib diisi.',
                    'exists' => 'ID Merchandise tidak valid.',
                ],
                'amount' => [
                    'required' => 'Jumlah permintaan wajib diisi.',
                    'integer' => 'Jumlah permintaan harus berupa angka.',
                    'min' => 'Jumlah permintaan minimal 1.',
                ],
                'note' => [
                    'string' => 'Catatan harus berupa teks.',
                    'max' => 'Catatan maksimal 255 karakter.',
                ],
            ]);

            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }

            $result = $this->mainRepository->storeRequestMerchData($dataRequest);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function createParcelByRequestMerch($id)
    {
        try {
            DB::beginTransaction();

            $requestMerch = $this->mainRepository->getDetailRequestMerch($id);
            if (!$requestMerch) {
                throw new Exception("Request merchandise with ID {$id} not found");
            }

            $merchandise = $this->merchRepository->getDetailMerch($requestMerch->merchandise_id);
            if (!$merchandise) {
                throw new Exception("Merchandise not found");
            }

            if ($merchandise->stock < $requestMerch->amount) {
                throw new Exception("Insufficient stock for merchandise");
            }

            $pointsToDeduct = $merchandise->point * $requestMerch->amount;

            $customer = $requestMerch->customer;
            if (!$customer) {
                throw new Exception("Customer not found");
            }

            if ($customer->point < $pointsToDeduct) {
                throw new Exception("Insufficient points in customer's account");
            }

            $customer->point -= $pointsToDeduct;
            $customer->save();

            $resiNumber = ResiNumber::generateResiNumber();

            $parcelData = [
                'resi_number' => $resiNumber,
                'customer_id' => $requestMerch->customer_id,
                'item_type' => 'Barang',
                'item_name' => $merchandise->name,
                'amount' => $requestMerch->amount,
                'note' => $requestMerch->note,
                'estimation_date' => now()->addDays(3)->format('Y-m-d'),
                'proof_img' => $merchandise->merchandise_img,
                'status' => 'pending'
            ];

            $parcel = $this->parcelRepository->insertParcel($parcelData);

            $newStock = $merchandise->stock - $requestMerch->amount;
            $this->merchRepository->updateMerchStock($merchandise->id, ['stock' => $newStock]);

            $updateData = [
                'approval' => true,
                'status' => 'Belum dikirim'
            ];

            $this->mainRepository->updateRequestMerchData($id, $updateData);

            DB::commit();
            return $parcel;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function declineRequestMerch($id)
    {
        try {
            DB::beginTransaction();

            $requestMerch = $this->mainRepository->getDetailRequestMerch($id);
            if (!$requestMerch) {
                throw new Exception("Request merchandise with ID {$id} not found");
            }

            $merchandise = $this->merchRepository->getDetailMerch($requestMerch->merchandise_id);
            if (!$merchandise) {
                throw new Exception("Merchandise not found");
            }

            $pointsToReturn = $merchandise->point * $requestMerch->amount;

            $customer = $requestMerch->customer;
            if (!$customer) {
                throw new Exception("Customer not found");
            }

            $customer->point += $pointsToReturn;
            $customer->save();

            $updateData = [
                'approval' => false,
                'status' => 'Ditolak'
            ];

            $result = $this->mainRepository->updateRequestMerchData($id, $updateData);

            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
