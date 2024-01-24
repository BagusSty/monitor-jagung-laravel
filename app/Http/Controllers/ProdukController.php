<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index() {
        if (Auth::check() && session("role") == 1) {
            $produk = Produk::all();
            return view("data-produk", compact("produk"));
            // return response()->json($produk);
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function create(Request $request) {
        if(Auth::check() && session("role") == 1) {
            // Mendapatkan tanggal dan bulan saat ini dalam format YYMM
            $dateCode = now()->format('ym');

            // Menghitung jumlah data untuk menentukan nomor urut
            $countProduk = Produk::whereYear('created_at', now()->year)
                                ->whereMonth('created_at', now()->month)
                                ->count();

            // Menambahkan 1 untuk mendapatkan nomor urut berikutnya
            $nextNumber = $countProduk + 1;

            // Membentuk produk_id dengan format YYMM-000X
            $produkId = 'JGG' . '-' . $dateCode . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
            $produk = Produk::create([
                // 'produk_id' => $produkId ,
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'created_at' => now(),
            ]);
            if($produk) {
                return redirect()->back()->with('success','Data produk berhasil ditambahkan');
            } else {
                return redirect()->back()->with('error','Data Gagal Ditambahkan');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function update(Request $request, $produk_id) {
        if(Auth::check() && session("role") == 1) {
            $produk = Produk::where('produk_id', $produk_id)->first();

            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi_produk = $request->deskripsi_produk;
            $produk->updated_at = now();
            $produk->save();

            return redirect()->back()->with('success','Data produk berhasil diupdate');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function destroy(Request $request, $produk_id) {
        if(Auth::check() && session("role") == 1) {
            $produk = Produk::where('produk_id', $produk_id)->first();
            $produk->delete();
            return redirect()->back()->with('success','Data produk berhasil dihapus');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
