<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;

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

Route::get('dashboard', function () {
    return view('dashboard');
});

//Sales
Route::get('sales', 'App\Http\Controllers\SalesController@data');
Route::get('addsales', 'App\Http\Controllers\SalesController@add');
Route::post('sales', 'App\Http\Controllers\SalesController@addProcess');
Route::get('editsales{id_sales}', 'App\Http\Controllers\SalesController@edit');
Route::patch('sales{id_sales}', 'App\Http\Controllers\SalesController@editProcess');
Route::get('editcash{id_sales}', 'App\Http\Controllers\SalesController@editcash');
Route::patch('cash{id_sales}', 'App\Http\Controllers\SalesController@editcashProcess');
Route::delete('sales{id_sales}', 'App\Http\Controllers\SalesController@delete');

//Produk
Route::get('produks', 'App\Http\Controllers\ProdukController@data');
Route::get('add', 'App\Http\Controllers\ProdukController@add');
Route::post('produks', 'App\Http\Controllers\ProdukController@addProcess');
Route::get('edit{id_produk}', 'App\Http\Controllers\ProdukController@edit');
Route::patch('produks/{id_produk}','App\Http\Controllers\ProdukController@editProcess');
Route::delete('produks{id_produk}','App\Http\Controllers\ProdukController@delete');

//Prospek
Route::get('prospek', 'App\Http\Controllers\ProspekController@data');
Route::get('prospek.add', 'App\Http\Controllers\ProspekController@add');
Route::post('prospek', 'App\Http\Controllers\ProspekController@addProcess');
Route::get('prospek.detail', 'App\Http\Controllers\ProspekController@show');

//Settings
Route::get('users', 'App\Http\Controllers\UsersController@data');
Route::get('users{id}', 'App\Http\Controllers\UsersController@edit');
Route::patch('users/{id}','App\Http\Controllers\UsersController@editProcess');

Route::get('produk', function () {
    return view('produk');
});

Route::get('detail_prospek', function () {
    return view('prospek/detail');
});

Route::get('settings', function () {
    return view('settings');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});