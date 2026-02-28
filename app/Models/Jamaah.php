<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    protected $table = 'jamaahs'; 

    protected $fillable = [
        'people_id',
        'package_id',
        'registration_number',
        'departure_date'
    ];
}