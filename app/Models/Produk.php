<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primary_key = 'produk_id';
    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
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
    public function produkMasuk() {
        return $this->hasMany(ProdukMasuk::class);
    }
}
