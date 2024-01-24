<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaslap extends Model
{
    use HasFactory;
    protected $table = 'gaslap';
    protected $primaryKey = 'gaslap_id';
    protected $fillable = [
        'user_id',
        'nip',
        'nama_gaslap',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($gaslap) {
            $gaslap->gaslap_id = 'GASLAP-' . str_pad(Gaslap::count() + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'gaslap_id'=> 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function produkMasuk(){
        return $this->hasMany(ProdukMasuk::class);
    }
}
