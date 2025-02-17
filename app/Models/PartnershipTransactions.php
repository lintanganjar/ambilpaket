<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipTransactions extends Model
{
    use HasFactory;

    protected $table = 'partnership_transactions';

    protected $fillable = [
        'agen_id',
        'amount',
        'from_partnership_id',
        'into_partnership_id',
        'payment_method_id',
        'request_status',
    ];

    public function agen()
    {
        return $this->belongsTo(Agen::class);
    }

    public function fromPartnership()
    {
        return $this->belongsTo(Partnerships::class, 'from_partnership_id');
    }

    public function intoPartnership()
    {
        return $this->belongsTo(Partnerships::class, 'into_partnership_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethods::class);
    }
}
