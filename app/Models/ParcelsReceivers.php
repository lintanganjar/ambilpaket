<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelsReceivers extends Model
{
    use HasFactory;

    protected $table = 'parcel_receivers';

    protected $fillable = [
        'parcel_id',
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
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcels::class);
    }
}
