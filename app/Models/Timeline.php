<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;

    protected $table = 'timeline'; 

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'parcel_id',
        'date',
        'detail',
    ];

    public function parcel()
    {
        return $this->belongsTo(Parcels::class, 'parcel_id'); // Menghubungkan dengan model Parcel
    }
}
