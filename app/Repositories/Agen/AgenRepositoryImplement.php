<?php

namespace App\Repositories\Agen;

use App\Models\Agen;
use App\Models\AgenSubmissions;
use App\Models\Partnerships;
use App\Models\PartnershipTransactions;
use App\Models\Scopes\AgenScope;
use App\Models\TopUpTransactions;
use Exception;
use Illuminate\Support\Facades\Log;
use LaravelEasyRepository\Implementations\Eloquent;

class AgenRepositoryImplement extends Eloquent implements AgenRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Agen $model)
    {
        $this->model = $model;
    }

    public function getAllAgenWithSearch($request)
    {
        // $query = $this->model;//Kode Sebelumnya
        $query = $this->model->with(['user','province','regency','district','partnership']);//Relasi baru
        if (
            !$request->province_id && !$request->regency_id && !$request->district_id &&
            !$request->email && !$request->username && !$request->name &&
            !$request->first_name && !$request->last_name &&
            !$request->phone_number && !$request->search
        ) {
            return $query->paginate(20);
        }
        $query = $query->withoutGlobalScope(AgenScope::class);

        if ($request->search) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
            ->orWhere('last_name', 'like', '%' . $request->search . '%');
        }

        if ($request->province_id) {
            $query->where('province_id', $request->province_id);
        }
        if ($request->regency_id) {
            $query->where('regency_id', $request->regency_id);
        }

        if ($request->district_id) {
            $query->where('district_id', $request->district_id);
        }

        if ($request->email || $request->username || $request->name || $request->first_name || $request->last_name  || $request->phone_number) {
            if ($request->email) {
                $query->where('email', 'like', '%' . $request->email . '%');
            }

            if ($request->username) {
                $query->where('username', 'like', '%' . $request->username . '%');
            }
            if ($request->first_name) {
                $query->where('first_name', 'like', '%' . $request->first_name . '%');
            }
            if ($request->last_name) {
                $query->where('last_name', 'like', '%' . $request->last_name . '%');
            }

            if ($request->name) {
                $query->where('first_name', 'like', '%' . $request->name . '%')
                    ->orwhere('last_name', 'like', '%' . $request->name . '%');
            }

            if ($request->phone_number) {
                $query->where('phone_number', 'like', '%' . $request->phone_number . '%');
            }
        }
        
        return $query->paginate(20);
    }

    public function getDetailAgen($id)
    {
        return $this->model->with(['partnership', 'submission', 'user'])->where('id', $id)->first();
    }

    public function getDetailAgenByRegencyId($regencyId)
    {
        return $this->model->with(['partnership', 'submission', 'user', 'province', 'regency', 'district'])->where('regency_id', $regencyId)->first();
    }

    public function getTopUpHistory()
    {
        try {
            return TopUpTransactions::whereIn('request_status', ['Sukses','Pending', 'Ditolak']) // Filter status
                ->with('agen') // Relasi ke agen
                ->orderBy('created_at', 'desc') // Urutkan dari terbaru
                ->get();
        } catch (\Exception $e) {
            throw new \Exception('Gagal mengambil riwayat top-up saldo: ' . $e->getMessage());
        }
    }
    public function getAgentById($agenId)
    {
        return $this->model::find($agenId); // Menggunakan model Agen untuk mendapatkan data agen
    }
    public function storeAgenData($dataAgen)
    {
        $agen = new $this->model;
        $agen->partnership_id = $dataAgen['partnership_id'] ?? null;
        $agen->submission_id = $dataAgen['submission_id'];
        $agen->user_id = $dataAgen['user_id'];
        $agen->first_name = $dataAgen['first_name'];
        $agen->last_name = $dataAgen['last_name'] ?? null;
        $agen->phone_number = $dataAgen['phone_number'];
        $agen->province_id = $dataAgen['province_id'] ?? null;
        $agen->regency_id = $dataAgen['regency_id'] ?? null;
        $agen->district_id = $dataAgen['district_id'] ?? null;
        $agen->full_address = $dataAgen['full_address'];
        $agen->building_type = $dataAgen['building_type'] ?? null;
        $agen->building_status = $dataAgen['building_status'] ?? null;
        $agen->location = $dataAgen['location'] ?? null;
        $agen->latitude = $dataAgen['latitude'] ?? null;
        $agen->longitude = $dataAgen['longitude'] ?? null;
        $agen->balance = $dataAgen['balance'] ?? null;
        $agen->bank_name = $dataAgen['bank_name'];
        $agen->account_name = $dataAgen['account_name'];
        $agen->account_number = $dataAgen['account_number'];
        $agen->profile_img = $dataAgen['profile_img'] ?? null;

        $agen->save();

        return $agen;
    }

    public function updatePartnershipStatus($id, $status)
    {
        try {
            // Menemukan pengajuan kemitraan berdasarkan ID
            $partnershipRequest = PartnershipTransactions::findOrFail($id);

            // Memperbarui status pengajuan kemitraan
            $partnershipRequest->request_status = $status;
            $partnershipRequest->save();

            return $partnershipRequest;
        } catch (Exception $e) {
            throw new Exception('Gagal memperbarui status kemitraan: ' . $e->getMessage());
        }
    }
    public function updateTopUpStatus($id, $status)
    {
        try {
            // Menemukan pengajuan top up berdasarkan ID
            $topUpTransaction = TopUpTransactions::findOrFail($id);

            // Memperbarui status pengajuan top up
            $topUpTransaction->request_status = $status;
            $topUpTransaction->save();

            // Jika status disetujui, update saldo agen
            if ($status == 'Sukses') {
                $topUpTransaction->agen->balance += $topUpTransaction->amount; // Menambahkan jumlah top up ke saldo agen
                $topUpTransaction->agen->save();
            }

            return $topUpTransaction;
        } catch (Exception $e) {
            throw new Exception('Gagal memperbarui status pengajuan top up saldo: ' . $e->getMessage());
        }
    }
}
