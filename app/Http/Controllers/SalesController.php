<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;

class SalesController extends Controller
{
    
    // Menampilkan Data pada Tabel Sales
    public function data()
    {
        $sales = DB::table('sales')->get();

        return view('sales.sales', compact('sales'));
    }

    // Menampilkan Halaman Tambah Data Sales
    public function add()
    {
        return view('sales.add_sales');
    }
    
    // Proses Tambah Data Sales
    public function addProcess(Request $request)
    {
        $request->validate([
            'nama_sales' => 'required',
            'username' => 'required|alpha_dash|different:nama_sales',
            'password' => 'required|min:6|max:8|confirmed',
            'no_hp' => 'required|max:13|starts_with:0',
            'alamat_sales' => 'required',
            'email' => 'required|email|unique:sales',
            'bank' => 'required',
            'norek' => 'required|max:17',
            'pendapatan' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png|max:5000',
        ], [
            'nama_sales.required'     => 'Nama Sales Wajib Diisi',
            'username.required'     => 'Username Wajib Diisi',
            'username.alpha_dash'     => 'Username Tidak Boleh Memiliki Spasi',
            'username.different'     => 'Username Tidak Boleh Sama Dengan Nama Lengkap',
            'password.required'       => 'Password Wajib Diisi',
            'password.min'       => 'Password Minimal 6 Karakter',
            'password.max'       => 'Password Maksimal 8 Karakter',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'no_hp.required'       => 'Nomor Telepon Wajib Diisi',
            'no_hp.max'       => 'Nomor Telepon Maksimal 12 Angka',
            'no_hp.starts_with'       => 'Nomor Telepon Harus Dimulai dari Angka 0',
            'alamat_sales.required'       => 'Alamat Sales Wajib Diisi',
            'email.required'       => 'Email Wajib Diisi',
            'email.email'       => 'Harap Masukkan Email Dengan Benar',
            'email.unique'       => 'Email Sudah Terdaftar',
            'bank.required'       => 'Bank Wajib Diisi',
            'norek.required'       => 'No Rekening Wajib Diisi',
            'norek.max'       => 'No Rekening Maksimal 17 Angka',
            'pendapatan.required'       => 'Pendapatan Wajib Diisi',
            'foto.required'       => 'Foto Wajib Di Upload',
            'foto.max'       => 'Ukuran Foto Maksimal 5Mb',
            'foto.mimes'       => 'Extensi foto harus berupa jpeg, jpg dan png'
        ]);

        $imageName = time().'.'.$request->foto->extension();
        $foto = $request->foto->move(public_path('images'), $imageName);

        $id = Sales::getId();
        foreach($id as $value);
        $idlama = $value->id;
        $idbaru = $idlama + 1;

        if ($idbaru<10) {
            $id_sales = "S00".$idbaru;
        }else if($idbaru<100){
            $id_sales = "S0".$idbaru;
        }else{
            $id_sales = "S".$idbaru;
        }

        DB::table('sales')->insert([
            'id_sales' => $id_sales,
            'nama_sales' => $request->nama_sales,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'alamat_sales' => $request->alamat_sales,
            'email' => $request->email,
            'bank' => $request->bank,
            'norek' => $request->norek,
            'pendapatan' => $request->pendapatan,
            'foto' => $imageName
        ]); 
        return redirect('sales')->with('status', 'Sales baru berhasil ditambahkan!')
                                ->with('foto',$imageName); 
    }

    // Menampilkan Halaman Ubah Data Sales
    public function edit($id_sales)
    {
        $sales = DB::table('sales')->where('id_sales', $id_sales)->first();
        return view('sales/edit_sales', compact('sales'));
    }

    // Proses Ubah Data Sales
    public function editProcess(Request $request, $id_sales)
    {
        $request->validate([
            'nama_sales' => 'required',
            'username' => 'required|alpha_dash|different:nama_sales',
            'no_hp' => 'required|max:13|starts_with:0',
            'alamat_sales' => 'required',
            'email' => 'required|email',
            'bank' => 'required',
            'norek' => 'required|max:17'
        ], [
            'nama_sales.required'     => 'Nama Sales Wajib Diisi',
            'username.required'     => 'Username Wajib Diisi',
            'username.alpha_dash'     => 'Username Tidak Boleh Memiliki Spasi',
            'username.different'     => 'Username Tidak Boleh Sama Dengan Nama Lengkap',
            'no_hp.required'       => 'Nomor Telepon Wajib Diisi',
            'no_hp.max'       => 'Nomor Telepon Maksimal 12 Angka',
            'no_hp.starts_with'       => 'Nomor Telepon Harus Dimulai dari Angka 0',
            'alamat_sales.required'       => 'Alamat Sales Wajib Diisi',
            'email.required'       => 'Email Wajib Diisi',
            'email.email'       => 'Harap Masukkan Email Dengan Benar',
            'bank.required'       => 'Bank Wajib Diisi',
            'norek.required'       => 'No Rekening Wajib Diisi',
            'norek.max'       => 'No Rekening Maksimal 17 Angka'
        ]);
        
        if($request->hasFile('foto')){
            $imageName = time().'.'.$request->foto->extension();
            $foto = $request->foto->move(public_path('images'), $imageName);
            DB::table('sales')->where('id_sales',$id_sales)
            ->update([
                'foto' => $imageName
            ]);
        }

        DB::table('sales')->where('id_sales', $id_sales)
            ->update([
                'nama_sales' => $request->nama_sales,
                'username' => $request->username,
                'no_hp' => $request->no_hp,
                'alamat_sales' => $request->alamat_sales,
                'email' => $request->email,
                'bank' => $request->bank,
                'norek' => $request->norek
            ]);
        return redirect('sales')->with('status', 'Data sales berhasil diubah!');
    }

    // Menampilkan Halaman Ubah Pendapatan Sales
    public function editcash($id_sales)
    {
        $sales = DB::table('sales')->where('id_sales',$id_sales)->first();
        return view('sales.cash', compact('sales'));
    }

    // Proses Ubah Pendapatan Sales
    public function editcashProcess(Request $request, $id_sales)
    {
        DB::table('sales')->where('id_sales',$id_sales)
            ->update([
                'pendapatan' => $request->pendapatan
            ]);
            return redirect('sales')->with('status', 'Pendapatan berhasil diubah');
    }

    // Proses Delete Data Sales
    public function delete($id_sales)
    {
        DB::table('sales')->where('id_sales', $id_sales)->delete();
        return redirect('sales')->with('status', 'Data sales berhasil dihapus!');
    }
}