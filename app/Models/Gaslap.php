<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaslap extends Model
{
    use HasFactory;
    protected $table = 'gaslap';
    protected $primary_key = 'gaslap_id';
    protected $fillable = [
        'user_id',
        'nip',
        'nama_gaslap',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
