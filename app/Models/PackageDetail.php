<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    protected $fillable = [
        'package_id','description','includes','excludes'
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}