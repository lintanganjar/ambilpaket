<?php

namespace App\Models;

use App\Models\Scopes\CourierScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couriers extends Model
{
    use HasFactory;

    protected $table = 'couriers';

    protected $fillable = [
        'users_id',
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
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new CourierScope);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
