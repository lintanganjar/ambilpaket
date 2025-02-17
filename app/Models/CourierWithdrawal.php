<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierWithdrawal extends Model
{
    use HasFactory;

    protected $table = 'courier_withdrawal';

    protected $fillable = [
        'courier_id',
        'amount',
        'bank_name',
        'account_name',
        'account_number',
        'request_status',
    ];

    public function courier()
    {   
        return $this->belongsTo(Couriers::class);
    }

}
