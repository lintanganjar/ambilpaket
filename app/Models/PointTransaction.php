<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointTransaction extends Model
{
    use HasFactory;

    protected $table = 'point_transactions'; 

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
