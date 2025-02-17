<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpTransactions extends Model
{
    use HasFactory;

    protected $table = 'top_up_transactions';

    protected $fillable = [
        'agent_id',
        'amount',
        'payment_method_id',
        'request_status',
    ];

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethods::class);
    }
}
