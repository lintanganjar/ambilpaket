<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';

    protected $fillable = [
        'user_id',
        'hub_id',
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

    public function hubs()
    {
        return $this->belongsTo(Hubs::class,'hub_id');
    }
}
