<?php

namespace App\Models;

use App\Models\Scopes\AgenScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;

    protected $table = 'agens';

    protected $fillable = [
        'partnership_id',
        'submission_id',
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'province_id',
        'regency_id',
        'district_id',
        'full_address',
        'building_type',
        'building_status',
        'location',
        'latitude',
        'longitude',
        'balance',
        'bank_name',
        'account_name',
        'account_number',
        'profile_img',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AgenScope);
    }

    public function partnership()
    {
        return $this->belongsTo(Partnerships::class);
    }

    public function submission()
    {
        return $this->belongsTo(AgenSubmissions::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pickUpRequest()
    {
        return $this->hasMany(PickUpRequest::class);
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
