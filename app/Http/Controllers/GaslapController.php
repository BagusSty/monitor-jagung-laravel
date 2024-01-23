<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaslapController extends Controller
{
    public function index() {
        return view("data-gaslap");
    }
}
