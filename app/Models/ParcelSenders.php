<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelSenders extends Model
{
    use HasFactory;

    protected $table = 'parcel_senders';

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
        return $this->belongsTo(Parcels::class);
    }
}
