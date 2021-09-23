<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;
    public static function getId()
    {
        return $getId = DB::table('produks')->orderBy('id', 'DESC')->take(1)->get();
    }
}
