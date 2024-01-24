<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kios extends Model
{
    use HasFactory;
    protected $table = 'kios';
    protected $primaryKey = 'kios_id';
    protected $fillable = [
        'nama_kios',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kios) {
            $count = DB::table('kios')->count() + 1;
            $kios->kios_id = 'KIOS-' . str_pad($count, 4, '0', STR_PAD_LEFT);
        });
    }
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'kios_id' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
