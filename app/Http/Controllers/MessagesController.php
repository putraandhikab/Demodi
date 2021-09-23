<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    // Menampilkan Halaman Messages
    public function data()
    {
        $sales = DB::table('sales')->get();

        return view('messages.data', compact('sales'));
    }
}
