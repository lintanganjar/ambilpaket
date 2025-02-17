<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierSubmission extends Model
{
    use HasFactory;

    protected $table = 'courier_submissions';

    protected $fillable = [
        'courier_type',
        'first_name',
        'last_name',
        'phone_number',
        'gender',
        'profile_img',
        'area_id',
        'balance',
        'bank_name',
        'account_name',
        'account_number',
        'approval',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
