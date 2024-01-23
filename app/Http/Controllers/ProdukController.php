<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view("data-produk");
        } else {
            return redirect('login')->with('error','Anda Belum Login');
        }
    }
}
