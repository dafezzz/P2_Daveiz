<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $fillable = [
        'type',
        'code',
        'slug',
        'name',
        'price',
        'quota',
        'quota_used',
        'departure_date',
        'duration_days',
        'departure_city',
        'room_type',
        'status'
    ];

    protected $casts = [
        'departure_date' => 'date',
        'price' => 'decimal:2'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function detail()
    {
        return $this->hasOne(PackageDetail::class, 'package_id');
    }

    public function itineraries()
    {
        return $this->hasMany(PackageItinerary::class, 'package_id');
    }

    public function photos()
    {
        return $this->hasMany(PackagePhoto::class, 'package_id');
    }

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class, 'package_id');
    }
}