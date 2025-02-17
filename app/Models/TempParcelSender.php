<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempParcelSender extends Model
{
    use HasFactory;
    
    protected $table = 'temp_parcel_senders';

    protected $fillable = [
        'parcel_id',
        'sender_first_name',
        'sender_last_name',
        'sender_phone_number',
        'sender_email',
        'sender_province_id',
        'sender_regency_id',
        'sender_district_id',
        'sender_postal_code',
        'sender_full_address',
    ];

    public function parcel()
    {
        return $this->belongsTo(TempParcel::class, 'parcel_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'sender_province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'sender_regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'sender_district_id');
    }
}
