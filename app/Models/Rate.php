<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $table = 'rate'; 

    protected $fillable = [
        'parcel_id',
        'kurir_id',
        'expedition_rate',
        'expedition_comment',
        'kurir_rate',
        'kurir_comment',
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcels::class, 'parcel_id'); // Menghubungkan dengan model Parcel
    }

    public function courier()
    {
        return $this->belongsTo(Couriers::class, 'kurir_id'); // Menghubungkan dengan model Courier
    }
}
