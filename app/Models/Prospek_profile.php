<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prospek_profile extends Model
{
    use HasFactory;
    protected $table = 'prospek_profiles';
    public function Jadwal(){
    return $this->hasMany('App\Models\Jadwal','id_profile');
    }
    public static function getId()
    {
        return $getId = DB::table('prospek_profiles')->orderBy('id', 'DESC')->take(1)->get();
    }
}
