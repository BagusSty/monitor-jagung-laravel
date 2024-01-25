<?php

namespace App\Exports;

use App\Models\ProdukMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;

class ProdukMasukExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($tahun, $bulan, $tanggal, $role) {
        $this->tahun = $tahun;
        $this->bulan = $bulan;
        $this->tanggal = $tanggal;
        $this->role = $role;
    }
    public function collection()
    {
        if($this->role == 1) {
            $query = ProdukMasuk::join('gaslap', 'gaslap.gaslap_id', '=', 'produk_masuk.gaslap_id')
                            ->join('produk', 'produk.produk_id', '=', 'produk_masuk.produk_id')
                            ->leftJoin('distributor','distributor.dist_id','=','produk_masuk.dist_id')
                            ->leftJoin('kios','kios.kios_id','=','produk_masuk.kios_id')
                            ->select('produk_masuk.*',  'gaslap.nama_gaslap', 'gaslap.user_id', 'produk.nama_produk', 'distributor.nama_dist', 'kios.nama_kios');
        } else {
            $query = ProdukMasuk::join('gaslap', 'gaslap.gaslap_id', '=', 'produk_masuk.gaslap_id')
                            ->join('produk', 'produk.produk_id', '=', 'produk_masuk.produk_id')
                            ->leftJoin('distributor','distributor.dist_id','=','produk_masuk.dist_id')
                            ->leftJoin('kios','kios.kios_id','=','produk_masuk.kios_id')
                            ->select('produk_masuk.*',  'gaslap.nama_gaslap', 'gaslap.user_id', 'produk.nama_produk', 'distributor.nama_dist', 'kios.nama_kios')
                            ->where('gaslap.user_id', '=', Auth::user()->user_id);
        }
        if ($this->tahun !== null) {
            $query->whereYear('produk_masuk.tanggal', $this->tahun);
        } elseif ($this->bulan !== null) {
            $query->whereMonth('produk_masuk.tanggal', $this->bulan);
        } elseif ($this->tanggal !== null) {
            $query->where('produk_masuk.tanggal', $this->tanggal);
        }
        return $query->get();
    }
}
