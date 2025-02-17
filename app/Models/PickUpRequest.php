<?php

namespace App\Models;

use App\Models\Scopes\PickUpRequestScope;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickUpRequest extends Model
{
    use HasFactory;

    protected $table = 'pick_up_request';

    protected $fillable = [
        'customer_umkm_id',
        'agen_id',
        'parcel_average_per_day',
        'parcel_type',
        'days_of_pickup',
        'time_of_pickup',
        'reason',
        'status',
    ];

    // Define Enum-like values for status
    const STATUS_MENUNGGU = 'Menunggu';
    const STATUS_DITERIMA = 'Diterima';
    const STATUS_DITOLAK = 'Ditolak';

    /**
     * Get the status attribute
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ?? self::STATUS_MENUNGGU,  // Default value
        );
    }

    /**
     * Mutator to set status
     */
    public function setStatusAttribute($value)
    {
        $validStatuses = [self::STATUS_MENUNGGU, self::STATUS_DITERIMA, self::STATUS_DITOLAK];
        if (!in_array($value, $validStatuses)) {
            throw new \InvalidArgumentException("Invalid status value: {$value}");
        }
        $this->attributes['status'] = $value;
    }
    protected static function booted(): void
    {
        static::addGlobalScope(new PickUpRequestScope);
    }

    public function customerUmkm()
    {
        return $this->belongsTo(CustomerUmkms::class);
    }

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }
}
