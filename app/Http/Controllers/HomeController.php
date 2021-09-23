<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\SalesController;

class HomeController extends Controller
{
    
    // Menampilkan Halaman Dashboard
    public function index()
    {
        $sales = DB::table('sales')->count();
        $produks = DB::table('produks')->count();
        $prospek = DB::table('prospek_profiles')->count();
        $jadwals = DB::table('jadwals')->count();

        return view('dashboard', compact('sales','produks','prospek','jadwals'));
    }
}
