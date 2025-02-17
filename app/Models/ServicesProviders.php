<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesProviders extends Model
{
    use HasFactory;

    protected $table = 'services_providers'; 

    protected $fillable = [
        'name',
        'courier_code',
        'logo',
    ];

    public function serviceTypes()
    {
        return $this->hasMany(ServicesTypes::class, 'service_provider_id');
    }
}
