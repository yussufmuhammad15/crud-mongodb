<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

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

// Route::get('/', function () {
//     return view('home');
// });

route::get('/', [BukuController::class, 'index']);

route::post('/store','App\Http\Controllers\BukuController@insert');

Route::put('/update/{kode}','App\Http\Controllers\BukuController@update')->name('buku.update');

Route::get('/delete/{kode}', 'App\Http\Controllers\BukuController@delete')->name('buku.delete'); 

Route::get('/cetak_pdf', 'App\Http\Controllers\BukuController@cetak_pdf');