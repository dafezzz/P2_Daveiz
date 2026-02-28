<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'fullname',
        'phone'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
