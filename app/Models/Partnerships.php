<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnerships extends Model
{
    use HasFactory;

    protected $table = 'partnerships';

    protected $fillable = [
        'name',
        'price',
        'commission',
        'other_benefits',
    ];
}
