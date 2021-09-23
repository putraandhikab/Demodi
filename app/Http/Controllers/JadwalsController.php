<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Prospek_profile;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalsController extends Controller
{
    // Menampilkan Data pada Tabel Jadwal
    public function data()
    {
        $jadwals = Jadwal::all();
        $sales = Sales::all();
        $prospek_profile = Prospek_profile::all();
        return view('jadwals.data')->with('jadwals', $jadwals,'sales', $sales,'prospek_profile', $prospek_profile);
    }

    // Menampilkan Halaman Tambah Jadwal
    public function add()
    {
        $sales = DB::table('sales')->get();
        $prospek_profiles = DB::table('prospek_profiles')->get();

        return view('jadwals.add')->with('sales', $sales)->with('prospek_profiles', $prospek_profiles);
    }

    // Proses Tambah Data Jadwal
    public function addProcess(Request $request)
    {
        $id = Jadwal::getId();
        foreach($id as $value);
        $idlama = $value->id;
        $idbaru = $idlama + 1;

        if ($idbaru<10) {
            $id_jadwal = "J00".$idbaru;
        }else if($idbaru<100){
            $id_jadwal = "J0".$idbaru;
        }else{
            $id_jadwal = "J".$idbaru;
        }

        DB::table('jadwals')->insert([
            'id_jadwal' => $id_jadwal,
            'id_sales' => $request->nama_sales,
            'id_profile' => $request->nama_prospek,
            'tanggal_kunjungan' => $request->tanggal_kunjungan
        ]);
        return redirect('jadwals')->with('status', 'Jadwal berhasil ditambahkan');
    }

    // Menampilkan Halaman Ubah Data Jadwal
    public function edit($id_jadwal)
    {
        $relation['jadwal'] = Jadwal::where('id_jadwal', $id_jadwal)->first();;
        $sales = DB::table('sales')->get();
        $prospek_profiles = DB::table('prospek_profiles')->get();
        $jadwals = DB::table('jadwals')->where('id_jadwal',$id_jadwal)->first();
        return view('jadwals.edit')->with('jadwals', $jadwals)->with('sales', $sales)->with('prospek_profiles', $prospek_profiles)->with($relation);
    }

    public function editProcess(Request $request, $id_jadwal)
    {
        DB::table('jadwals')->where('id_jadwal',$id_jadwal)
            ->update([
                'id_sales' => $request->id_sales,
                'id_profile' => $request->id_profile,
                'tanggal_kunjungan' => $request->tanggal_kunjungan
            ]);
            return redirect('jadwals')->with('status', 'Jadwal berhasil diedit');
    }

    // Proses Hapus Data Jadwal
    public function delete($id_jadwal)
    {
        DB::table('jadwals')->where('id_jadwal', $id_jadwal)->delete();
        return redirect('jadwals')->with('status', 'Jadwal berhasil dihapus');
    }
}