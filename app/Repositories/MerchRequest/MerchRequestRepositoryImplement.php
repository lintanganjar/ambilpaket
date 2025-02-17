<?php

namespace App\Repositories\MerchRequest;

use App\Models\Customer;
use App\Models\Merchandise;
use App\Models\User;
use App\Models\MerchandiseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use LaravelEasyRepository\Implementations\Eloquent;

class MerchRequestRepositoryImplement extends Eloquent implements MerchRequestRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(MerchandiseRequest $model)
    {
        $this->model = $model;
    }

    public function getAllRequestMerchWithSearch($request)
    {
        $query = $this->model
            ->orderBy('request_date', 'desc');
        
        if($request->search){
            $merch_id = Merchandise::where('name' , 'like' ,'%'.$request->search.'%')->pluck('id');
            $query->whereIn('merchandise_id', $merch_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        if ($request->merchandise_id) {
            $query->where('merchandise_id', $request->merchandise_id);
        }

        if ($request->date_from && $request->date_to) {
            $query->whereBetween('request_date', [$request->date_from, $request->date_to]);
        }

        return $query->paginate(20);
    }

    public function getDetailRequestMerch($id)
    {
        return $this->model
            ->with(['merchandise', 'customer'])
            ->find($id);
    }

    public function getWaitingList()
    {
        return $this->model->where('status', 'Menunggu Konfirmasi') // Misalnya status 'waiting' untuk yang menunggu
            ->orderBy('created_at', 'desc')
            ->get();
    }
    
    public function storeRequestMerchData($dataRequest)
    {
        $user = User::where('id', Auth::user()->id)->with('customer')->first();
        $request = new $this->model;

        $request->merchandise_id = $dataRequest['merchandise_id'];
        $request->user_id = $user->id;
        $request->status = $dataRequest['status'] ?? 'Menunggu Konfirmasi';
        $request->request_date = $dataRequest['request_date'] ?? now();
        $request->amount = $dataRequest['amount'];
        $request->note = $dataRequest['note'] ?? null;

        $request->save();

        return $request;
    }

    public function updateRequestMerchData($id, $data)
    {
        $request = $this->model->find($id);

        if (!$request) {
            return false;
        }

        if (isset($data['approval'])) {
            $request->approval = $data['approval'] === true ? 1 : 0; // Konversi ke 1 atau 0
        }
        if (isset($data['status'])) {
            $request->status = $data['status'];
        }

        $request->save();

        return $request;
    }
}
