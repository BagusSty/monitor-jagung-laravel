<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        $user = Auth::user();
        if (Auth::check()) {
            if ($user->role == 1) {
                return view('dashboard');
            } else if ($user->role == 2) {
                return view('dashboard');
            } else {
                return redirect('login')->with('error','Anda Belum Login');
            }
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
                if(Auth::user()->role == 1) {
                    return redirect()->intended(route('home'));
                } elseif(Auth::user()->role == 2) {
                    return redirect()->intended(route('home'));
                } else {
                    return back()->with('error','Email atau Password anda salah');
                }
            } else {
                return back()->with('error','Email atau Password anda salah');
            }
        }
    }
    public function logout() {
        Auth::logout();
        return redirect('login')->with('success','Berhasil Logout');
    }

}
