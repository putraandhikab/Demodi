<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    // Menampilkan Data pada Tabel User(Admin)
    public function data()
    {
        $users = DB::table('users')->get();

        return view('users.data')->with('users', $users);
    }

    // Menampilkan Halaman Ubah Data User(Admin)
    public function edit($id)
    {
        $users = DB::table('users')->where('id',$id)->first();
        return view('users.edit', compact('users'));
    }

    // Proses Ubah Data User(Admin)
    public function editProcess(Request $request, $id)
    {
        if($request->hasFile('foto')){
            $imageName = time().'.'.$request->foto->extension();
            $foto = $request->foto->move(public_path('images'), $imageName);
            DB::table('users')->where('id',$id)
            ->update([
                'foto' => $imageName
            ]);
        }
        

        DB::table('users')->where('id',$id)
            ->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phonenumber' => $request->phonenumber,
                'address' => $request->address
                // 'foto' => $imageName
            ]);
            return redirect('dashboard')->with('status', 'Data User berhasil diedit');
    }

    // Menampilkan Halaman Ubah Password User(Admin)
    public function changepassword()
    {
        // $users = DB::table('users')->where('id',$id)->first();
        return view('users.changepassword');
    }

}