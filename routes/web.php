<?php

use App\Models\Penduduk;
use App\Models\Provinsi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\PendudukController;

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

// Route::resource('/', function () {
//     return view('welcome');
// });

// route::get('penduduk', function () {
//     return view('Penduduk.Index');
// });
// route::get('penduduk-tambah', function () {
//     return view('Penduduk.Create');
// });
// route::get('provinsi', function () {
//     return view('Penduduk.Provinsi.Index');
// });
// route::get('provinsi-tambah', function () {
//     return view('Penduduk.Provinsi.Create');
// });

Route::resource('provinsi', ProvinsiController::class);
Route::resource('kabupaten', KabupatenController::class);
Route::resource('penduduk', PendudukController::class);
Route::resource('/', PendudukController::class);
