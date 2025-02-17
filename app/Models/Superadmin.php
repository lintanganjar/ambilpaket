<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    use HasFactory;

    protected $table = 'superadmins';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'province_id',
        'regency_id',
        'district_id',
        'full_address',
        'profile_img',
    ];

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
