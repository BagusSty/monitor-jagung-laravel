<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "user_id";
    protected $fillable = [
        'user_id',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'user_id'=> 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function gaslap()
    {
        return $this->hasOne(Gaslap::class);
    }
}

