<?php

namespace App\Models;

use App\Models\Scopes\ParcelAssignmentScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelAssignment extends Model
{
    use HasFactory;

    protected $table = 'parcel_assigment'; 

    protected $fillable = [
        'assignment_date',
        'kurir_id',
        'parcel_id',
        'status_reason',
        'status',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new ParcelAssignmentScope);
    }

    public function couriers()
    {
        return $this->belongsTo(Couriers::class, 'kurir_id'); // Menghubungkan dengan model Courier
    }

    public function parcels()
    {
        return $this->belongsTo(Parcels::class, 'parcel_id'); // Menghubungkan dengan model Parcel
    }
}
