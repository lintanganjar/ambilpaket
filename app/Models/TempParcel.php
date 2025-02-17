<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempParcel extends Model
{
    use HasFactory;

    protected $table = 'temp_parcels';
    protected $fillable = [
        'temp_resi_number',
        'customer_id',
        'customer_umkm_id',
        'price',
        'item_type',
        'item_name',
        'amount',
        'weight',
        'item_height',
        'item_width',
        'item_length',
        'note',
        'service_price_id',
        'estimation_date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function customerUmkm()
    {
        return $this->belongsTo(CustomerUmkms::class);
    }

    public function servicePrice()
    {
        return $this->belongsTo(ServicesPrices::class);
    }

    public function parcelReceiver()
    {
        return $this->hasOne(ParcelsReceivers::class, 'parcel_id');
    }

    public function parcelSender()
    {
        return $this->hasOne(ParcelSenders::class, 'parcel_id');
    }
}
