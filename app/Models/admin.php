<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'people_id'
    ];

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}