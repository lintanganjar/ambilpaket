<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesTypes extends Model
{
    use HasFactory;

    protected $table = 'services_types'; 

    protected $fillable = [
        'service_provider_id',
        'name',
        'note',
    ];

    public function serviceProvider()
    {
        return $this->belongsTo(ServicesProviders::class, 'service_provider_id'); // Menghubungkan dengan model ServicesProvider
    }
}
