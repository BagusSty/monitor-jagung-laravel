<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        $user = Auth::user();
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
    public function login(Request $request) {
        if(Auth::check()) {
            return view('dashboard');
        } else {
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                session(['user' => Auth::user()->username]);
                session(['role'=> Auth::user()->role]);

                return redirect()->intended(route('home'));
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
