<?php

namespace App\Models;

use App\Models\Scopes\ParcelScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcels extends Model
{
    use HasFactory;

    protected $table = 'parcels';

    protected $fillable = [
        'resi_number',
        'actual_resi_number',
        'agen_id',
        'customer_id',
        'customer_umkm_id',
        'price',
        'agen_commission',
        'item_type',
        'item_name',
        'amount',
        'weight',
        'item_height',
        'item_width',
        'item_lenght',
        'note',
        'service_price_id',
        'estimation_date',
        'receiver_origin',
        'proof_img',
        'status'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ParcelScope);
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

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
        return $this->belongsTo(ServicesPrices::class, 'service_price_id');
    }
    public function parcelAssignment()
    {
        return $this->hasOne(ParcelAssignment::class); // Menghubungkan dengan model Parcel Assignment
    }

    public function timeline()
    {
        return $this->hasMany(Timeline::class, 'parcel_id');
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
