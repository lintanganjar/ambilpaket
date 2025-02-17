<?php

namespace App\Services\Rate;

use Exception;
use InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Rate\RateRepository;

class RateServiceImplement extends Service implements RateService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(RateRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    public function getAllRate()
    {
        return $this->mainRepository->getAllRate();
    }

    public function showRatingById($id)
    {
        return $this->mainRepository->showRatingById($id);
    }

    public function showRatingByParcelId($parcelId)
    {
        return $this->mainRepository->showRatingByParcelId($parcelId);
    }

    public function rating($data)
    {
      $validator = Validator::make($data, [
        'parcel_id' => 'bail|required|integer',
        'kurir_id' => 'bail|required|integer',
        'expedition_rate' => 'integer|nullable',
        'expedition_comment' => 'string|max:255|nullable',
        'kurir_rate' => 'integer|nullable',
        'kurir_comment' => 'string|max:255|nullable',
      ], [
        'parcel_id' => [
            'required' => 'ID Paket wajib diisi.',
            'integer' => 'ID Paket harus berupa angka.',
        ],
        'kurir_id' => [
            'required' => 'ID Kurir wajib diisi.',
            'integer' => 'ID Kurir harus berupa angka.',
        ],
        'expedition_rate' => [
            'integer' => 'Rating Ekspedisi harus berupa angka.',
        ],
        'expedition_comment' => [
            'string' => 'Komentar Ekspedisi harus berupa teks.',
            'max' => 'Komentar Ekspedisi maksimal 255 karakter.',
        ],
        'kurir_rate' => [
            'integer' => 'Rating Kurir harus berupa angka.',
        ],
        'kurir_comment' => [
            'string' => 'Komentar Kurir harus berupa teks.',
            'max' => 'Komentar Kurir maksimal 255 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->rating($data);
      } catch (Exception $e) {
        DB::rollBack();
        Log::info($e->getMessage());

        throw new InvalidArgumentException('Unable to Store Data ' . $e->getMessage());
      }

      DB::commit();

      return $result;
    }

    public function updateRating($id, $data)
    {
      $validator = Validator::make($data, [
        'expedition_rate' => 'bail|integer|nullable',
        'expedition_comment' => 'string|max:255|nullable',
        'kurir_rate' => 'bail|integer|nullable',
        'kurir_comment' => 'string|max:255|nullable',
      ], [
        'expedition_rate' => [
            'integer' => 'Rating Ekspedisi harus berupa angka.',
        ],
        'expedition_comment' => [
            'string' => 'Komentar Ekspedisi harus berupa teks.',
            'max' => 'Komentar Ekspedisi maksimal 255 karakter.',
        ],
        'kurir_rate' => [
            'integer' => 'Rating Kurir harus berupa angka.',
        ],
        'kurir_comment' => [
            'string' => 'Komentar Kurir harus berupa teks.',
            'max' => 'Komentar Kurir maksimal 255 karakter.',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }

      DB::beginTransaction();

      try {
        $result = $this->mainRepository->update($id,$data);
      } catch (Exception $e) {
        DB::rollBack();
        throw new Exception($e->getMessage());
      }

      DB::commit();

      return $result;
    }
}
