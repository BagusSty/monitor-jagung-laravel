<?php

namespace App\Http\Controllers;

use App\Models\Kios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KiosController extends Controller
{
    public function index() {
        if (Auth::check() && session("role") == 1) {
            $kios = Kios::all();
            return view("data-kios", compact("kios"));
            // return response()->json($kios);
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function create(Request $request) {
        if(Auth::check() && session("role") == 1) {
            $kios = Kios::create([
                'nama_kios' => $request->nama_kios,
                'created_at' => now(),
            ]);
            if($kios) {
                return redirect()->back()->with('success','Data kios berhasil ditambahkan');
            } else {
                return redirect()->back()->with('error','Data Gagal Ditambahkan');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function update(Request $request, $kios_id) {
        if(Auth::check() && session("role") == 1) {
            $kios = Kios::where('kios_id', $kios_id)->first();

            $kios->nama_kios = $request->nama_kios;
            $kios->updated_at = now();
            $kios->save();

            return redirect()->back()->with('success','Data kios berhasil diupdate');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function destroy(Request $request, $kios_id) {
        if(Auth::check() && session("role") == 1) {
            $kios = kios::where('kios_id', $kios_id)->first();
            $kios->delete();
            return redirect()->back()->with('success','Data kios berhasil dihapus');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
