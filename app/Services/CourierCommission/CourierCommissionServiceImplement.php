<?php

namespace App\Services\CourierCommission;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\CourierCommission\CourierCommissionRepository;

class CourierCommissionServiceImplement extends Service implements CourierCommissionService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(CourierCommissionRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getCourierCommission($request)
    {
      return $this->mainRepository->getCourierCommissionWithSearch($request);
    }

    public function storeCourierWithDrawalData($dataCourier)
    {
      $validator = Validator::make($dataCourier, [
        'amount' => 'bail|required|integer',
        'bank_name' => 'bail|required|string|max:255',
        'account_name' => 'bail|required|string|max:255',
        'account_number' => 'bail|required|string|max:255',
      ], [
        'amount' => [
            'required' => 'Jumlah wajib diisi.',
            'integer' => 'Jumlah harus berupa angka.',
        ],
        'bank_name' => [
            'required' => 'Nama Bank wajib diisi.',
            'string' => 'Nama Bank harus berupa teks.',
            'max' => 'Nama Bank maksimal 255 karakter.',
        ],
        'account_name' => [
          'required' => 'Nama Akun wajib diisi.',
          'string' => 'Nama Akun harus berupa teks.',
          'max' => 'Nama Akun maksimal 255 karakter.',
        ],
        'account_number' => [
          'required' => 'Nomer Akun wajib diisi.',
          'string' => 'Nomer Akun harus berupa teks.',
          'max' => 'Nomer Akun maksimal 255 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->storeCourierWithDrawalData($dataCourier);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Store Data');
      }

      DB::commit();

      return $result;
    }
    
    public function courierWithdrawal($request)
    {
      return $this->mainRepository->courierWithdrawal($request);
    }

    public function courierWithdrawalHistory($request)
    {
      return $this->mainRepository->courierWithdrawalHistory($request);
    }

    public function acceptCourierWithdrawal($id)
    {
      $data = [
        'request_status' => 'Sukses',
      ];
      return $this->mainRepository->update($id,$data);
    }

    public function declineCourierWithdrawal($id)
    {
      $data = [
        'request_status' => 'Ditolak',
      ];
      return $this->mainRepository->update($id,$data);
    }
}
