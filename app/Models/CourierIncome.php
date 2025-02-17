<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierIncome extends Model
{
    use HasFactory;

    protected $table = 'courier_incomes';

    protected $fillable = [
        'courier_id',
        'parcel_id',
        'income',
    ];

    public function courier()
    {
        return $this->belongsTo(Couriers::class);
    }

    public function parcel()
    {
        return $this->belongsTo(Parcels::class);
    }
}
