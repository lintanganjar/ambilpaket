<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempParcelReceiver extends Model
{
    use HasFactory;

    protected $table = 'temp_parcel_receivers';

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
        return $this->belongsTo(TempParcel::class, 'parcel_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'reciever_province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'reciever_regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'reciever_district_id');
    }
}
