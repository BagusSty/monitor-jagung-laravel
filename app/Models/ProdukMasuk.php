<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukMasuk extends Model
{
    use HasFactory;
    protected $table = 'produk_masuk';
    protected $primaryKey = 'id_produk_masuk';
    protected $fillable = [
        'kode_produk',
        'produk_id',
        'gaslap_id',
        'dist_id',
        'kios_id',
        'expired_produk',
        'stok',
        'satuan',
        'tanggal',
        'lokasi',
        'posisi',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function produk() {
        return $this->belongsTo(Produk::class);
    }
    public function kios() {
        return $this->belongsTo(Kios::class);
    }
    public function distributor() {
        return $this->belongsTo(Distributor::class);
    }
    public function gaslap() {
        return $this->belongsTo(Gaslap::class);
    }
}
