<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey = 'produk_id';
    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'nama_gaslap',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produk) {
            // Use DB::table instead of the Eloquent model to avoid potential issues
            $count = DB::table('gaslaps')->count() + 1;
            $produk->produk_id = 'JGG-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'produk_id' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function produkMasuk() {
        return $this->hasMany(ProdukMasuk::class);
    }
}
