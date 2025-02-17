<?php

namespace App\Models;

use App\Models\Scopes\CustomerUmkmScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerUmkms extends Model
{
    use HasFactory;

    protected $table = 'customer_umkms';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'company_name',
        'product_type',
        'province_id',
        'regency_id',
        'district_id',
        'full_address',
        'point',
        'latitude',
        'longitude',
        'parcel_average_per_day',
        'pickup_activation',
        'days_of_pickup',
        'time_of_pickup',
        'profile_img',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new CustomerUmkmScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
