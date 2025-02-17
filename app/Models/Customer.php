<?php

namespace App\Models;

use App\Models\Scopes\CustomerScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'province_id',
        'regency_id',
        'district_id',
        'postal_code',
        'full_address',
        'point',
        'profile_img',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new CustomerScope);
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
