<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Gaslap;
use App\Models\Produk;
use App\Models\ProdukMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Kios;

class IndexController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();
            $dist = Kios::select('kios_id as id', 'nama_kios as nama_dist_kios')
                    ->union(Distributor::select('dist_id as id', 'nama_dist as nama_dist_kios'))
                    ->get();
            $produk = Produk::all();
            $gaslap = Gaslap::where("user_id", $user->user_id)->get();
            if ($user->role == 1) {
                $tabel = ProdukMasuk::join('gaslap', 'gaslap.gaslap_id', '=', 'produk_masuk.gaslap_id')
                                ->join('produk', 'produk.produk_id', '=', 'produk_masuk.produk_id')
                                ->leftJoin('distributor','distributor.dist_id','=','produk_masuk.dist_id')
                                ->leftJoin('kios','kios.kios_id','=','produk_masuk.kios_id')
                                ->select('produk_masuk.*',  'gaslap.nama_gaslap', 'produk.nama_produk', 'distributor.nama_dist', 'kios.nama_kios')
                                ->get();
            } else {
                $tabel = ProdukMasuk::join('gaslap', 'gaslap.gaslap_id', '=', 'produk_masuk.gaslap_id')
                                ->join('produk', 'produk.produk_id', '=', 'produk_masuk.produk_id')
                                ->leftJoin('distributor','distributor.dist_id','=','produk_masuk.dist_id')
                                ->leftJoin('kios','kios.kios_id','=','produk_masuk.kios_id')
                                ->select('produk_masuk.*',  'gaslap.nama_gaslap', 'gaslap.user_id', 'produk.nama_produk', 'distributor.nama_dist', 'kios.nama_kios')
                                ->where('gaslap.user_id', '=', $user->user_id)
                                ->get();
            }

            return view('dashboard', compact('user','dist','gaslap', 'produk', 'tabel'));
            // return response()->json([
            //     'tes'=> $tabel,
            // ]);
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function create(Request $request) {
        if (Auth::check()) {
            $dist_kios = substr($request->dist_kios, 0, 4);
            $dist = null;
            $kios = null;
            if($dist_kios === 'DIST') {
                $dist = $request->dist_kios;
            } elseif ($dist_kios === 'KIOS') {
                $kios = $request->dist_kios;
            }
            $produk_masuk = ProdukMasuk::create([
                'kode_produk'=> $request->kode,
                'gaslap_id'=> $request->gs_id,
                'produk_id' => $request->produk,
                'stok'=> $request->stok,
                'satuan' => $request->satuan,
                'tanggal' => $request->tanggal,
                'lokasi' => $request->wilayah,
                'posisi' => $request->kabupaten,
                'dist_id' => $dist,
                'kios_id' => $kios,
                'expired_produk' => $request->expired,
                'created_at' => now(),
            ]);
            if ($produk_masuk) {
                return back()->with('success','Data berhasil ditambahkan');
            } else {
                return back()->with('error','Data gagal ditambahkan');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function update(Request $request, $id_produk_masuk){
        if (Auth::check()) {
            $dist_kios = substr($request->dist_kios, 0, 4);
            $dist = null;
            $kios = null;
            if($dist_kios === 'DIST') {
                $dist = $request->dist_kios;
            } elseif ($dist_kios === 'KIOS') {
                $kios = $request->dist_kios;
            }
            $produkMasuk = ProdukMasuk::where('id_produk_masuk', $id_produk_masuk)->first();

            $produkMasuk->kode_produk = $request->kode;
            $produkMasuk->gaslap_id = $request->gs_id;
            $produkMasuk->produk_id = $request->produk;
            $produkMasuk->stok = $request->stok;
            $produkMasuk->satuan = $request->satuan;
            $produkMasuk->tanggal = $request->tanggal;
            $produkMasuk->posisi = $request->kabupaten;
            $produkMasuk->lokasi = $request->wilayah;
            $produkMasuk->dist_id = $dist;
            $produkMasuk->kios_id = $kios;
            $produkMasuk->expired_produk = $request->expired;
            $produkMasuk->updated_at = now();
            $produkMasuk->save();

            return back()->with('success','Data berhasil diupdate');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }

    }
    public function destroy($produk_masuk_id){
        if (Auth::check()) {
            $produkMasuk = ProdukMasuk::where('id_produk_masuk', $produk_masuk_id)->first();

            $produkMasuk->delete();
            return back()->with('success','Data berhasil dihapus');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
