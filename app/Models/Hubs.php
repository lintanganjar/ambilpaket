<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubs extends Model
{
    use HasFactory;

    protected $table = 'hubs';

    protected $fillable = [
        'area_id',
        'name',
        'province_id',
        'regency_id',
        'district_id',
        'full_address',
        'latitude',
        'longitude',
    ];

    public function admin()
    {
        return $this->hasOne(Admin::class,'hub_id','id');
    }

    // Relasi ke Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    // Relasi ke Province
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    // Relasi ke Regency
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id', 'id');
    }

    // Relasi ke District
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
