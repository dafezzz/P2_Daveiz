<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['people_id'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
