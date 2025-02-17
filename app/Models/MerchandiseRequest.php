<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Merchandise;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\MerchRequestScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchandiseRequest extends Model
{
    use HasFactory;

    protected $table = 'merchandise_request'; 

    protected $fillable = [
        'merchandise_id',
        'user_id',
        'status',
        'request_date',
        'amount',
        'note',
    ];
    
    protected static function booted(): void
    {
        static::addGlobalScope(new MerchRequestScope);
    }

    protected $casts = [
        'request_date' => 'date'
    ];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class, 'merchandise_id'); // Menghubungkan dengan model Merchandise
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Menghubungkan dengan model User
    }
}
