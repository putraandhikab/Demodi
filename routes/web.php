<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

//Dashboard
Route::get('dashboard', 'App\Http\Controllers\HomeController@index');

//Sales
Route::get('sales', 'App\Http\Controllers\SalesController@data');
Route::get('sales.add', 'App\Http\Controllers\SalesController@add');
Route::post('sales', 'App\Http\Controllers\SalesController@addProcess');
Route::get('editsales{id_sales}', 'App\Http\Controllers\SalesController@edit');
Route::patch('sales{id_sales}', 'App\Http\Controllers\SalesController@editProcess');
Route::get('editcash{id_sales}', 'App\Http\Controllers\SalesController@editcash');
Route::patch('cash{id_sales}','App\Http\Controllers\SalesController@editcashProcess');
Route::delete('sales{id_sales}', 'App\Http\Controllers\SalesController@delete');

//Produk
Route::get('produks', 'App\Http\Controllers\ProdukController@data');
Route::get('produks.add', 'App\Http\Controllers\ProdukController@add');
Route::post('produks', 'App\Http\Controllers\ProdukController@addProcess');
Route::get('editproduk{id_produk}', 'App\Http\Controllers\ProdukController@edit');
Route::patch('produks/{id_produk}','App\Http\Controllers\ProdukController@editProcess');
Route::delete('produks{id_produk}','App\Http\Controllers\ProdukController@delete');

//Prospek
Route::get('prospek', 'App\Http\Controllers\ProspekController@data');
Route::get('prospek.add', 'App\Http\Controllers\ProspekController@add');
Route::post('prospek', 'App\Http\Controllers\ProspekController@addProcess');
Route::get('prospek.detail{id_profile}', 'App\Http\Controllers\ProspekController@show');
Route::get('editprospek{id_profile}', 'App\Http\Controllers\ProspekController@edit');
Route::patch('prospek/{id_profile}','App\Http\Controllers\ProspekController@editProcess');

//Jadwal
Route::get('jadwals', 'App\Http\Controllers\JadwalsController@data');
Route::get('jadwals.add', 'App\Http\Controllers\JadwalsController@add');
Route::post('jadwals', 'App\Http\Controllers\JadwalsController@addProcess');
Route::get('editjadwals{id_jadwal}', 'App\Http\Controllers\JadwalsController@edit');
Route::patch('jadwals/{id_jadwal}','App\Http\Controllers\JadwalsController@editProcess');
Route::delete('jadwals{id_jadwal}','App\Http\Controllers\JadwalsController@delete');

//Users
Route::get('users', 'App\Http\Controllers\UsersController@data');
Route::get('users{id}', 'App\Http\Controllers\UsersController@edit');
Route::patch('users/{id}','App\Http\Controllers\UsersController@editProcess');
Route::get('changepassword', 'App\Http\Controllers\UsersController@changepassword');

//Messages
Route::get('messages', 'App\Http\Controllers\MessagesController@data');

//Forgot Password
Route::get('forgotpassword1', function () {
    return view ('forgotpassword1');
})->name('forgotpassword1');
Route::post('forgotpasswordUsername', 'App\Http\Controllers\AuthController@forgotpasswordUsername')->name('forgotpasswordUsername');
Route::get('forgotpassword2', function () {
    return view ('forgotpassword2');
})->name('forgotpassword2');
Route::post('forgotpasswordProcess', 'App\Http\Controllers\AuthController@forgotpasswordProcess')->name('forgotpasswordProcess');

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});