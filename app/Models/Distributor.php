<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'distributor';
    protected $primaryKey = 'dist_id';
    protected $fillable = [
        'nama_dist',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dist) {
            $count = DB::table('distributor')->count() + 1;
            $dist->dist_id = 'DIST-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'dist_id' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function produkMasuk() {
        return $this->hasMany(ProdukMasuk::class);
    }
}
