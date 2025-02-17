<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';

    protected $fillable = [
        'bank_name',
        'account_name',
        'account_number',
    ];
}
