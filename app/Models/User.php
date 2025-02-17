<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
        'role',
        'banned',
        'ban_reason'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function superadmin()
    {
        return $this->hasOne(Superadmin::class);
    }

    public function finance()
    {
        return $this->hasOne(Finance::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    public function agen()
    {
        return $this->hasOne(Agen::class);
    }

    public function couriers()
    {
        return $this->hasOne(Couriers::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function customerUmkm()
    {
        return $this->hasOne(CustomerUmkms::class);
    }
}
