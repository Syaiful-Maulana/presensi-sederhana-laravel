<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresensiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('simpanRegistrasi', [LoginController::class, 'simpanRegistrasi'])->name('simpanRegistrasi');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth','CekLevel:admin,karyawan']], function (){
    Route::get('home', function () {
        return view('home');
    });
    Route::resource('presensi', PresensiController::class);
    Route::get('keluar', [PresensiController::class, 'keluar'])->name('keluar');
    Route::post('prosesKeluar', [PresensiController::class, 'prosesKeluar'])->name('prosesKeluar');
    Route::get('filterData/', [PresensiController::class, 'filterData'])->name('filterData');
    Route::get('filter-data/{tglawal}/{thlakhir}', [PresensiController::class, 'tampil'])->name('tampil');
});