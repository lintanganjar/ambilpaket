<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesPrices extends Model
{
    use HasFactory;

    protected $table = 'services_prices'; 

    protected $fillable = [
        'service_type_id',
        'price',
        'origin_city',
        'destination_city',
    ];

    public function serviceType()
    {
        return $this->belongsTo(ServicesTypes::class, 'service_type_id'); // Menghubungkan dengan model ServiceType
    }
}
