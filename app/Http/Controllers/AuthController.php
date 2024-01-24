<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Distributor;
use App\Models\Produk;
use App\Models\Gaslap;
use App\Models\Kios;
use App\Models\ProdukMasuk;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        if(Auth::check()) {
            $user = Auth::user();
            $dist = Kios::select('kios_id as id', 'nama_kios as nama_dist_kios')
                    ->union(Distributor::select('dist_id as id', 'nama_dist as nama_dist_kios'))
                    ->get();
            $produk = Produk::all();
            $gaslap = Gaslap::where("user_id", $user->user_id)->get();
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
            return redirect()->route('home')->with(compact('user', 'dist', 'gaslap', 'produk', 'tabel'));
        } else {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user = Auth::user();
                $dist = Kios::select('kios_id as id', 'nama_kios as nama_dist_kios')
                        ->union(Distributor::select('dist_id as id', 'nama_dist as nama_dist_kios'))
                        ->get();
                $produk = Produk::all();
                $gaslap = Gaslap::where("user_id", $user->user_id)->get();
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
                return redirect()->route('home')->with(compact('user', 'dist', 'gaslap', 'produk', 'tabel'));

            } else {
                return back()->with('error','Email atau Password anda salah');
            }
        }
    }
    public function indexChangePW() {
        return view('ubah-password');
    }
    public function changePassword(Request $request) {
        $user = User::where('username', $request->username)->first();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error','Ubah password gagal');
        }

        $user->update([
            'password'=> bcrypt($request->new_password),
        ]);

        return redirect('login')->with('success','Password berhasil diubah');
    }
    public function logout() {
        Auth::logout();
        return redirect('login')->with('success','Berhasil Logout');
    }

}
