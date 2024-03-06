<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController ;
use App\Http\Controllers\JenisBarangController;
use App\http\Controllers\BarangController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;


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
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' =>['auth']], function(){
Route::get('/home', [HomeController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/destroy/{id}', [UserController::class, 'destroy']);
Route::get('/lap_user', [LaporanController::class, 'lap_user']);


Route::get('/jenisbarang', [JenisBarangController::class, 'index']);
Route::post('/jenisbarang/store', [JenisBarangController::class, 'store']);
Route::post('/jenisbarang/update/{id}', [JenisBarangController::class, 'update']);
Route::post('/jenisbarang/destroy/{id}', [JenisBarangController::class, 'destroy']);
Route::get('/lap_jenis', [LaporanController::class, 'lap_jenis']);


Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang/store', [BarangController::class, 'store']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);
Route::post('/barang/destroy/{id}', [BarangController::class, 'destroy']);
Route::get('/lap_barang', [LaporanController::class, 'lap_barang']);


Route::get('/setdiskon', [DiskonController::class, 'index']);
Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update']);

Route::get('/profile', [UserController::class, 'profile']);
Route::post('/profile/updateprofile/{id}', [UserController::class, 'updateprofile']);

Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::get('/transaksi/create', [TransaksiController::class, 'create']);

});

