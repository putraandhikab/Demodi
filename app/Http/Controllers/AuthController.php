<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;
  
  
class AuthController extends Controller
{
    // Menampilkan Halaman Login
    public function showFormLogin()
    {
        if (Auth::check()) { 
            //Login Success
            return redirect()->route('dashboard');
        }
        return view('login');
    }
    
    // Proses Login
    public function login(Request $request)
    {
        $rules = [
            'username'              => 'required',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'username.required'     => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
  
        if (Auth::check()) { 

            //Login Sukses
            return redirect()->route('dashboard');
  
        } else { 
  
            //Login Gagal
            Session::flash('error', 'Username atau password salah');
            return redirect()->route('login');
        }
  
    }

    //Proses Forgot Password Check Username
    public function forgotpasswordUsername(Request $request){
        $data = [
            'username'     => $request->input('username')
        ];

        if (!DB::table('users')->where('username', $data)->first() != null) { 

            Session::flash('error', 'Username tidak ditemukan');
            return redirect()->route('forgotpassword1');
  
        } else { 
            return redirect()->route('forgotpassword2');
        }
    }

    //Proses Forgot Password Ubah Password
    public function forgotpasswordProcess(Request $request){
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ], [
            'password.required'     => 'Password Wajib Diisi',
            'password.min'     => 'Password minimal berisi 6 karakter',
            'password.confirmed'     => 'Password tidak sama dengan konfirmasi password'
        ]);

        DB::table('users')->where('username', 'demodi')
            ->update([
                'password' => Hash::make($request->password)
            ]);
        return redirect('login')->with('status', 'Password berhasil diubah! Silahkan melakukan login ulang.');
    }

    // Menampilkan Halaman Registrasi
    public function showFormRegister()
    {
        return view('register');
    }
    
    // Proses Registrasi
    public function register(Request $request)
    {
        $rules = [
            'firstname'             => 'required',
            'lastname'              => 'required',
            'username'              => 'required|unique:users',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|confirmed',
            'phonenumber'           => 'required|max:13',
            'address'               => 'required'
        ];
  
        $messages = [
            'firstname.required'    => 'Nama Depan wajib diisi',
            'lastname.required'     => 'Nama Belakang wajib diisi',
            'username.required'     => 'Username wajib diisi',
            'username.unique'       => 'Username sudah terdaftar',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password',
            'phonenumber.required'  => 'Nomor Telepon Wajib Diisi',
            'phonenumber.max'       => 'Nomor Telepon Maksimal 12 Angka',
            'address.required'      => 'Alamat wajib diisi'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $user = new User;
        $user->firstname = ucwords(strtolower($request->firstname));
        $user->lastname = ucwords(strtolower($request->lastname));
        $user->username = strtolower($request->username);
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->phonenumber = $request->phonenumber;
        $user->address = $request->address;
        $simpan = $user->save();
  
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data sebagai admin');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal!']);
            return redirect()->route('register');
        }
    }

    // Proses Logout
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
  
  
}