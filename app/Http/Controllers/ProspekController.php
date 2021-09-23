<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Prospek_profile;

class ProspekController extends Controller
{

    // Menampilkan Data pada Tabel Prospek
    public function data()
    {
        $prospek = DB::table('prospek_profiles')->get();

        return view('prospek.data')->with('prospek',$prospek);
    }

    // Menampilkan Halaman Tambah Data Prospek
    public function add(){
        $prospek = DB::table('produks')->get();

        return view('prospek.add')->with('prospek',$prospek); 
    }

    // Proses Tambah Data Prospek
    public function addProcess(Request $request){
        $request->validate([
            'nama_profile' => 'required' ,
            'nohp_profile' => 'required|max:13',
            'alamat_profile' => 'required',
            'longtitude' => 'required',
            'latitude' => 'required',
            'metode_pembelian' => 'required',
            'kepemilikan_rumah' => 'required',
            'akses_kendaraan' => 'required',
            'tanggal_pengiriman' => 'required',
            'ketersediaan_dana' => 'required',
            'booking_fee' => 'required',
            'merk' => 'required',
            'tipe' => 'required',
            'down_payment' => 'required',
            'tipe_asuransi' => 'required',
            'diskon' => 'required',
            'penawaran_lain' => 'required',
            'leasing' => 'required',
            'kunjungan_selanjutnya' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png|max:5000',
        ], [
            'nama_profile.required' => 'Nama Profile Wajib Diisi' ,
            'nohp_profile.required'=> 'Nomor Telepon Profile Wajib Diisi' ,
            'alamat_profile.required'=> 'Alamat Profile Wajib Diisi',
            'longtitude.required'=> 'Longtitude Wajib Diisi',
            'latitude.required'=> 'Latitude Wajib Diisi',
            'metode_pembelian.required'=> 'Metode Pembelian Wajib Diisi',
            'kepemilikan_rumah.required'=> 'Kepemilikan Rumah Wajib Diisi',
            'akses_kendaraan.required'=> 'Akses Kendaraan Wajib Diisi',
            'tanggal_pengiriman.required'=> 'Tanggal Pengiriman Wajib Diisi',
            'ketersediaan_dana.required'=> 'Ketersediaan Dana Wajib Diisi',
            'booking_fee.required'=> 'Booking Fee Wajib Diisi',
            'merk.required'=> 'Merk Wajib Diisi',
            'tipe.required'=> 'Tipe Wajib Diisi',
            'down_payment.required'=> 'Down Payment Wajib Diisi',
            'tipe_asuransi.required'=> 'Tipe Asuransi Wajib Diisi',
            'diskon.required'=> 'Diskon Wajib Diisi',
            'penawaran_lain.required'=> 'Penawaran Lain Wajib Diisi',
            'leasing.required'=> 'Leasing Wajib Diisi',
            'kunjungan_selanjutnya.required'=> 'Kunjungan Selanjutnya Wajib Diisi' ,
            'foto.required' => 'Foto Wajib Diisi',
            'foto.max'       => 'Ukuran Foto Maksimal 5Mb',
            'foto.mimes'       => 'Extensi foto harus berupa jpeg, jpg dan png',
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $foto = $request->foto->move(public_path('images'), $imageName);

        $id = Prospek_profile::getId();
        foreach($id as $value);
        $idlama = $value->id;
        $idbaru = $idlama + 1;

        if ($idbaru<10) {
            $id_profile = "PR00".$idbaru;
        }else if($idbaru<100){
            $id_profile = "PR0".$idbaru;
        }else{
            $id_profile = "PR".$idbaru;
        }

        DB::table('prospek_profiles')->insert([
            'id_profile' => $id_profile,
            'nama_profile' => $request->nama_profile,
            'nohp_profile' => $request->nohp_profile,
            'alamat_profile' => $request->alamat_profile,
            'longtitude' => $request->longtitude,
            'latitude' => $request->latitude,
            'metode_pembelian' => $request->metode_pembelian,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
            'akses_kendaraan' => $request->akses_kendaraan,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'ketersediaan_dana' => $request->ketersediaan_dana,
            'booking_fee' => $request->booking_fee,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'down_payment' => $request->down_payment,
            'tipe_asuransi' => $request->tipe_asuransi,
            'diskon' => $request->diskon,
            'penawaran_lain' => $request->penawaran_lain,
            'leasing' => $request->leasing,
            'kunjungan_selanjutnya' => $request->kunjungan_selanjutnya,
            'foto' => $imageName
        ]);
        return redirect('prospek')->with('status', 'prospek Berhasil ditambahkan');
    }

    // Menampilkan Halaman Detail Prospek
    public function show($id_profile)
    {
        $prospek = DB::table('prospek_profiles')->where('id_profile',$id_profile)->get();
        
        return view('prospek.detail')->with('prospek',$prospek);
    }

    // Menampilkan Halaman Ubah Data Produk
    public function edit($id_profile)
    {
        $prospek = DB::table('prospek_profiles')->where('id_profile',$id_profile)->first();
        $produk = DB::table('produks')->get();

        return view('prospek.edit', compact('prospek','produk'));
    }

    // Proses Ubah Data Produk
    public function editProcess(Request $request, $id_profile)
    {
        if($request->hasFile('foto')){
            $imageName = time().'.'.$request->foto->extension();
            $foto = $request->foto->move(public_path('images'), $imageName);
            DB::table('prospek_profiles')->where('id_profile',$id_profile)
            ->update([
                'foto' => $imageName
            ]);
        }

        $diskon = $request->diskon/100;
        
        DB::table('prospek_profiles')->where('id_profile',$id_profile)
            ->update([
            'nama_profile' => $request->nama_profile,
            'nohp_profile' => $request->nohp_profile,
            'alamat_profile' => $request->alamat_profile,
            'longtitude' => $request->longtitude,
            'latitude' => $request->latitude,
            'metode_pembelian' => $request->metode_pembelian,
            'kepemilikan_rumah' => $request->kepemilikan_rumah,
            'akses_kendaraan' => $request->akses_kendaraan,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
            'ketersediaan_dana' => $request->ketersediaan_dana,
            'booking_fee' => $request->booking_fee,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'down_payment' => $request->down_payment,
            'tipe_asuransi' => $request->tipe_asuransi,
            'diskon' => $diskon,
            'penawaran_lain' => $request->penawaran_lain,
            'leasing' => $request->leasing,
            'kunjungan_selanjutnya' => $request->kunjungan_selanjutnya
            ]);
            return redirect('prospek')->with('status', 'Prospek berhasil diedit');
    }
}