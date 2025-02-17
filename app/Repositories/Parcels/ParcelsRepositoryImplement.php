<?php

namespace App\Repositories\Parcels;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Parcels;
use App\Models\Timeline;
use App\Models\Merchandise;
use Illuminate\Support\Arr;
use App\Models\ParcelAssignment;
use App\Models\ParcelsReceivers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Timeline\TimelineService;
use LaravelEasyRepository\Implementations\Eloquent;

class ParcelsRepositoryImplement extends Eloquent implements ParcelsRepository
{
    /**
     * Model class to be used in this repository for the common methods inside Eloquent.
     * Don't remove or change $this->model variable name.
     * @property Model|mixed $model;
     */
    protected $model;


    public function __construct(Parcels $model)
    {
        $this->model = $model;
    }

    public function getAllWithSearch($request)
    {
        $search = $request->input('search');
        $user = User::where('id', Auth::user()->id)->first();
        $status = $request->input('status');
        $resiNumber = $request->input('resi_number');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        return $this->model->with([
            'parcelReceiver',
            'parcelSender',
            'servicePrice.serviceType.serviceProvider',
            'timeline'
        ])
            ->when($user, function ($query) use ($user) {
                switch ($user->role) {
                    case 'Agen':
                        $newUser = User::with('agen')->where('id', $user->id)->first();
                        $query->where('agen_id', $newUser->agen->id);
                        break;
                    case 'Customer':
                        $newUser = User::with('customer')->where('id', $user->id)->first();
                        $query->where('customer_id',  $newUser->customer->id);
                        break;
                    case 'UMKM':
                        $newUser = User::with('customerUmkm')->where('id', $user->id)->first();
                        $query->where('customer_umkm_id', $newUser->customerUmkm->id);
                        break;
                }
            })->when($startDate || $endDate, function ($query) use ($startDate, $endDate) {
                $start = $startDate . ' 00:00:00';
                $end = $endDate . ' 23:59:59';
                $query->whereBetween('created_at', [$start, $end]);
            })
            ->when($resiNumber, function ($query) use ($resiNumber) {
                $query->where('resi_number', 'like', "%$resiNumber%");
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('resi_number', 'like', "%$search%")
                        ->orWhere('item_name', 'like', "%$search%")
                        ->orWhere('status', 'like', "%$search%")
                        ->orWhere('note', 'like', "%$search%")
                        ->orWhereHas('parcelReceiver', function ($query) use ($search) {
                            $query->where('reciever_first_name', 'like', "%$search%")
                                ->orWhere('reciever_last_name', 'like', "%$search%")
                                ->orWhere('reciever_phone_number', 'like', "%$search%")
                                ->orWhere('reciever_email', 'like', "%$search%")
                                ->orWhere('reciever_full_address', 'like', "%$search%")
                                ->orWhere('reciever_latitude', 'like', "%$search%")
                                ->orWhere('reciever_longitude', 'like', "%$search%");
                        })
                        ->orWhereHas('parcelSender', function ($query) use ($search) {
                            $query->where('sender_first_name', 'like', "%$search%")
                                ->orWhere('sender_last_name', 'like', "%$search%")
                                ->orWhere('sender_phone_number', 'like', "%$search%")
                                ->orWhere('sender_email', 'like', "%$search%")
                                ->orWhere('sender_full_address', 'like', "%$search%");
                        });
                });
            })
            ->get();
    }

    public function getByResi($resi)
    {
        return $this->model->with([
            'parcelReceiver',
            'parcelSender',
            'servicePrice.serviceType.serviceProvider',
            'timeline'
        ])->where('resi_number', $resi)->first();
    }

    public function getById($id)
    {
        return $this->model->where('id', $id)->with(
            'parcelReceiver',
            'parcelSender',
            'servicePrice.serviceType.serviceProvider',
            'timeline',
        )->first();
    }

    /**
     * Find a parcel by its ID.
     */
    public function findById($id)
    {
        return $this->model->where('id', $id)->first();;
    }

    /**
     * Get parcels by status with optional search filter.
     */
    public function getParcelsByStatus(string $status, ?string $search)
    {
        $query = $this->model->with(['customer' => function ($query) {
            $query->withoutGlobalScopes();
        }])->where('status', $status);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhere('receiver_name', 'like', "%$search%")
                    ->orWhere('receiver_address', 'like', "%$search%");
            });
        }

        return $query->get();
    }


    public function insertParcel($data)
    {
        $parcel = new $this->model;
        $parcel->resi_number = $data['resi_number'];
        $parcel->actual_resi_number = $data['resi_number'];
        $parcel->agen_id = $data['agen_id'] ?? null;
        $parcel->customer_id = $data['customer_id'] ?? null;
        $parcel->customer_umkm_id = $data['customer_umkm_id'] ?? null;
        $parcel->price = $data['price'] ?? null;
        $parcel->agen_commission = $data['agen_commission'] ?? null;
        $parcel->item_type = $data['item_type'] ?? null;
        $parcel->item_name = $data['item_name'];
        $parcel->amount = $data['amount'];
        $parcel->weight = $data['weight'] ?? null;
        $parcel->item_height = $data['item_height'] ?? null;
        $parcel->item_width = $data['item_width'] ?? null;
        $parcel->item_lenght = $data['item_lenght'] ?? null;
        $parcel->note = $data['note'] ?? null;
        $parcel->service_price_id = $data['service_price_id'] ?? null;
        $parcel->estimation_date = $data['estimation_date'];
        $parcel->receiver_origin = $data['receiver_origin'] ?? null;
        $parcel->proof_img = $data['proof_img'] ?? null;
        $parcel->status = $data['status'] ?? 'Dalam Perjalanan';
        $parcel->save();

        return $parcel;
    }

    public function update($id, array $data)
    {
        $parcel = $this->model->where('id', $id)->first();
        if (!$parcel) {
            return null;
        }

        $parcel->agen_id = $data['agen_id'] ?? $parcel->agen_id;
        $parcel->customer_id = $data['customer_id'] ?? $parcel->customer_id;
        $parcel->customer_umkm_id = $data['customer_umkm_id'] ?? $parcel->customer_umkm_id;
        $parcel->price = $data['price'] ?? $parcel->price;
        $parcel->agen_commission = $data['agen_commission'] ?? $parcel->agen_commission;
        $parcel->item_type = $data['item_type'] ?? $parcel->item_type;
        $parcel->item_name = $data['item_name'] ?? $parcel->item_name;
        $parcel->amount = $data['amount'] ?? $parcel->amount;
        $parcel->weight = $data['weight'] ?? $parcel->weight;
        $parcel->item_height = $data['item_height'] ?? $parcel->item_height;
        $parcel->item_width = $data['item_width'] ?? $parcel->item_width;
        $parcel->item_lenght = $data['item_lenght'] ?? $parcel->item_lenght;
        $parcel->note = $data['note'] ?? $parcel->note;
        $parcel->service_price_id = $data['service_price_id'] ?? $parcel->service_price_id;
        $parcel->estimation_date = $data['estimation_date'] ?? $parcel->estimation_date;
        $parcel->receiver_origin = $data['receiver_origin'] ?? $parcel->receiver_origin;
        $parcel->proof_img = $data['proof_img'] ?? $parcel->proof_img;
        $parcel->status = $data['status'] ?? $parcel->status;

        $parcel->save();

        return $parcel;
    }

    public function updateTimelineParcelByResi($resi, array $timelineData)
    {
        $parcel = $this->getByResi($resi);

        if ($parcel) {
            $parcel->timeline = $timelineData;
            $parcel->save();
            return $parcel;
        }
    }

    public function getParcelsForChartThisYear(?string $StartDate, ?string $EndDate)
    {
        $now = Carbon::now();
        $query = $this->model->selectRaw('MONTH(created_at) as month , COUNT(*) as total, SUM(price) as pendapatan')->where('status' ,'Selesai');
        if($StartDate && $EndDate){
            $query->whereBetween('created_at',[$StartDate,$EndDate]);
        }else{
            $query->where('created_at','>=',$now->startOfYear()->format('Y-m-d H:i:s'));
        }

        $result =  $query->groupBy('month')->orderBy('month')->get();
        $bulan = [
            0 => 'Januari',
            1 => 'Februari',
            2 => 'Maret',
            3 => 'April',
            4 => 'Mei',
            5 => 'Juni',
            6 => 'Juli',
            7 => 'Agustus',
            8 => 'September',
            9 => 'Oktober',
            10 => 'November',
            11 => 'Desember'
        ];
        $bulan = collect($bulan);
        $pendapatan = 0;
        $lastResult = $bulan->map(function ($item, $key) use($result, &$pendapatan) {
            $data = $result->firstWhere('month', $key + 1);
            $pendapatan += $data->pendapatan ?? 0;
            return  [
                'month' => $item,
                'pendapatan' => $data ? $pendapatan :  null,
                'total' => $data ? $data->total : null, // Jika tidak ada hasil, set total ke 0
            ];
        });
        return $lastResult;
    
    }

    public function getParcelsIncomeAndOutcome($status){
        $parcel = $this->model->get();
        switch($status){
            case 'masuk':
                $data = Timeline::where('parcel_id', $parcel->id)->where('detail', 'like', "%Paket telah ditandai masuk%")->get();
        }
    }
    
    public function newParcel($data){
        $merch = $data['merch'];
        $reciever = $data['receiver'];
        $parcelQuery = $this->model->query();
        $recieverQuery = ParcelsReceivers::query();
        $timelineQuery = Timeline::query();
        $item = Merchandise::find($data['merch']['select']);
        if (!$item) {
            throw new \Exception("Merchandise tidak ditemukan.");
        }

        DB::beginTransaction();
        try{
            $parcel = $parcelQuery->create([
                "item_name" => $item->name,
                "amount" => $merch['ammount'],
                "estimation_date" => $merch['date'],
                "note" => $merch['note'],
                "resi_number" => $data['resi_number'],
                "actual_resi_number" => $data['resi_number'],
                "status" => $data['status']
            ]);
    
            $recieverQuery->create([
                "parcel_id" => $parcel->id,
                "reciever_first_name" => $reciever['first_name'],
                "reciever_last_name" => $reciever['last_name'],
                "reciever_province_id" => $reciever['province'],
                "reciever_regency_id" => $reciever['regency'],
                "reciever_district_id" => $reciever['district'],
                "reciever_full_address" => $reciever['address'],
            ]);

            $timelineQuery->create([
                "parcel_id" => $parcel->id,
            ]);

            DB::commit();
            
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e; 
        }

    }
}
