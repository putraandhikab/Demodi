<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    public function Jadwal(){
    	return $this->hasMany('App\Models\Jadwal','id_sales');
    }

    public static function getId()
    {
        return $getId = DB::table('sales')->orderBy('id', 'DESC')->take(1)->get();
    }
}
