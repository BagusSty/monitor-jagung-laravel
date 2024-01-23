<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Gaslap;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GaslapController extends Controller
{
    public function index() {
        if(Auth::check()) {
            $gaslap = User::join("gaslap", 'users.user_id', '=', 'gaslap.user_id')->get();
            return view("data-gaslap", compact("gaslap"));
            // return response()->json($gaslap);
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }

    }
    public function create(Request $request) {
        if(Auth::check()) {
            try {
                DB::beginTransaction();

                $user = User::create([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'role' => 2,
                    'created_at' => now(),
                ]);
                $user_detail = Gaslap::create([
                    'user_id'=> $user->user_id,
                    'nama_gaslap' => $request->nama_gaslap,
                    'nip' => $request->nip,
                    'created_at' => now(),
                ]);
                DB::commit();

                return redirect()->back()->with('success','Data gaslap berhasil ditambahkan');

            } catch (\Exception $e) {
                DB::rollback();

                return redirect()->back()->with('error', 'Gagal menambahkan data');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function update(Request $request, $user_id, $gaslap_id) {
        if(Auth::check()) {
            try {
                DB::beginTransaction();
                $user = User::find($user_id);
                $gaslap = Gaslap::where('gaslap_id', $gaslap_id)->first();
                $user->update([
                    'username'=> $request->username,
                    'password'=> bcrypt($request->password),
                    'updated_at' => now(),
                ]);
                $gaslap->nama_gaslap = $request->nama_gaslap;
                $gaslap->nip = $request->nip;
                $gaslap->updated_at = now();
                $gaslap->save();
                DB::commit();

                return redirect()->back()->with('success','Data gaslap berhasil ditambahkan');
                // return response()->json([
                //     'succes' => $user
                // ], 200);

            } catch (\Exception $e) {
                DB::rollback();

                return redirect()->back()->with('error', 'Gagal menambahkan data');
                // return response()->json([
                //     'error'=> $e->getMessage(),
                // ], 400);
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function destroy(Request $request, $user_id, $gaslap_id) {
        if(Auth::check()) {
            try {
                DB::beginTransaction();
                $user = User::find($user_id);
                $gaslap = Gaslap::where('gaslap_id', $gaslap_id)->first();
                $gaslap->delete();
                $user->delete();
                DB::commit();

                return redirect()->back()->with('success','Data gaslap berhasil ditambahkan');
            } catch (\Exception $e) {
                DB::rollback();

                return redirect()->back()->with('error', 'Gagal menambahkan data');
            }
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
