<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index() {
        if (Auth::check() && Auth::user()->role == 1) {
            $distributor = Distributor::all();
            return view("data-distributor", compact("distributor"));
            // return response()->json($distributor);
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function create(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $distributor = distributor::create([
                'nama_dist' => $request->nama_dist,
                'created_at' => now(),
            ]);
            if($distributor) {
                return redirect()->back()->with('success','Data distributor berhasil ditambahkan');
            } else {
                return redirect()->back()->with('error','Data Gagal Ditambahkan');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function update(Request $request, $dist_id) {
        if(Auth::check() && Auth::user()->role == 1) {
            $distributor = distributor::where('dist_id', $dist_id)->first();

            $distributor->nama_dist = $request->nama_dist;
            $distributor->updated_at = now();
            $distributor->save();

            return redirect()->back()->with('success','Data distributor berhasil diupdate');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function destroy(Request $request, $dist_id) {
        if(Auth::check() && Auth::user()->role == 1) {
            $distributor = distributor::where('dist_id', $dist_id)->first();
            $distributor->delete();
            return redirect()->back()->with('success','Data distributor berhasil dihapus');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
