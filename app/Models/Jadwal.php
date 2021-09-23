<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    public function Sales(){
    	return $this->belongsTo('App\Models\Sales','id_sales','id_sales');
    }

    public function Prospek_profile(){
    	return $this->belongsTo('App\Models\Prospek_profile','id_profile','id_profile');
    }

    public static function getId()
    {
        return $getId = DB::table('jadwals')->orderBy('id', 'DESC')->take(1)->get();
    }
}
