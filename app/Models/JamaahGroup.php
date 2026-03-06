<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JamaahGroup extends Model
{
    protected $fillable = [
        'name',
        'departure_date',
        'package_id',
        'leader_name',
        'notes'
    ];

    protected $casts = [
        'departure_date' => 'date'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function jamaahs()
    {
        return $this->hasMany(Jamaah::class,'group_id');
    }
}