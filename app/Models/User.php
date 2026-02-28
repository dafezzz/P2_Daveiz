<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'userable_id',
        'userable_type',
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userable()
    {
        return $this->morphTo();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($roles)
    {
        if (is_array($roles)) {
            return $this->roles()->whereIn('name',$roles)->exists();
        }

        return $this->roles()->where('name',$roles)->exists();
    }
}