<?php

namespace App\Services\Ongkir;

use Exception;
use App\utils\APICekOngkir;
use InvalidArgumentException;
use LaravelEasyRepository\Service;
use Illuminate\Support\Facades\Validator;
use App\Repositories\ServiceProvider\ServiceProviderRepository;

class OngkirServiceImplement extends Service implements OngkirService{

    protected $serviceProviderRepository;

    public function __construct(ServiceProviderRepository $serviceProviderRepository)
    {
      $this->serviceProviderRepository = $serviceProviderRepository;
    }

    public function cekOngkir($data){
      $validator = Validator::make($data, [
        'origin' => 'bail|required|integer',
        'destination' => 'bail|required|integer',
        'weight' => 'bail|required|integer',
      ], [
        'origin' => [
          'required' => 'Asal harus dipilih.',
          'integer' => 'Asal harus berupa angka.',
        ],
        'destination' => [
          'required' => 'Tujuan harus dipilih.',
          'integer' => 'Tujuan harus berupa angka.',
        ],
        'weight' => [
          'required' => 'Berat harus diisi.',
          'integer' => 'Berat harus berupa angka bulat. Berat dalam Kilogram, cth : 2',
        ],
      ]);

      if($validator->fails()){
        throw new InvalidArgumentException($validator->errors()->first());
      }
      $toGram = 000;
      $data['weight'] = $data['weight'].$toGram;
      $serviceProviders = $this->serviceProviderRepository->all();
      $courierCodesString = '';
      foreach ($serviceProviders as $provider) {
          $courierCodesString .= $provider->courier_code . ':';
      }
      $courierCodesString = rtrim($courierCodesString, ':');
      $data['courier'] = $courierCodesString;
      $dataOngkir = APICekOngkir::CekOngkir($data);
      $response = [];
      foreach ($dataOngkir as $ongkir) {
        if ($ongkir['costs']) { // If the Service Provider is unable to generate cost the it wont be show
          $response[] = [
            'code' => $ongkir['code'],
            'name' => $ongkir['name'],
            'costs' => $ongkir['costs'],
        ];
        }
      }
      return $response;
  }
}
