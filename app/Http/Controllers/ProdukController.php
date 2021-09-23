<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;

class ProdukController extends Controller
{

    // Menampilkan Data pada Tabel Produk
    public function data()
    {
        $produks = DB::table('produks')->get();

        return view('produk.data')->with('produks', $produks);
    }

    // Menampilkan Halaman Tambah Data Produk
    public function add()
    {
        return view('produk.add');
    }

    // Proses Tambah Data Produk
    public function addProcess(Request $request)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'merk.required'     => 'Merk Wajib Diisi',
            'tipe.required'     => 'Tipe Wajib Diisi',
            'warna.required'     => 'Warna Wajib Diisi',
            'harga.required'       => 'Harga Wajib Diisi',
            'stok.required'       => 'Stok Wajib Diisi'
        ]);

        $id = Produk::getId();
        foreach($id as $value);
        $idlama = $value->id;
        $idbaru = $idlama + 1;

        if ($idbaru<10) {
            $id_produk = "P00".$idbaru;
        }else if($idbaru<100){
            $id_produk = "P0".$idbaru;
        }else{
            $id_produk = "P".$idbaru;
        }

        DB::table('produks')->insert([
            'id_produk' => $id_produk,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'warna' => $request->warna,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect('produks')->with('status', 'Produk berhasil ditambahkan');
    }

    // Menampilkan Halaman Ubah Data Produk
    public function edit($id_produk)
    {
        $produk = DB::table('produks')->where('id_produk',$id_produk)->first();
        return view('produk.edit', compact('produk'));
    }

    // Proses Ubah Data Produk
    public function editProcess(Request $request, $id_produk)
    {
        $request->validate([
            'merk' => 'required',
            'tipe' => 'required',
            'warna' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ], [
            'merk.required'     => 'Merk Wajib Diisi',
            'tipe.required'     => 'Tipe Wajib Diisi',
            'warna.required'     => 'Warna Wajib Diisi',
            'harga.required'       => 'Harga Wajib Diisi',
            'stok.required'       => 'Stok Wajib Diisi'
        ]);
        
        DB::table('produks')->where('id_produk',$id_produk)
            ->update([
                'merk' => $request->merk,
                'tipe' => $request->tipe,
                'warna' => $request->warna,
                'harga' => $request->harga,
                'stok' => $request->stok
            ]);
            return redirect('produks')->with('status', 'Produk berhasil diedit');
    }

    // Proses Hapus Data Produk
    public function delete($id_produk)
    {
        DB::table('produks')->where('id_produk', $id_produk)->delete();
        return redirect('produks')->with('status', 'Produk berhasil dihapus');
    }
}