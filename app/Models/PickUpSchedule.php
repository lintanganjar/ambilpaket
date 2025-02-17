<?php

namespace App\Models;

use App\Models\Scopes\PickUpScheduleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUpSchedule extends Model
{
    use HasFactory;

    protected $table = 'pick_up_schedule';

    protected $fillable = [
        'request_id', 
        'agen_id',
        'customer_umkm_id',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new PickUpScheduleScope);
    }

    public function request()
    {
        return $this->belongsTo(PickUpRequest::class);
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    public function customerUmkm()
    {
        return $this->belongsTo(CustomerUmkms::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class, 'parcel_id', 'parcel_id');
    }
}
