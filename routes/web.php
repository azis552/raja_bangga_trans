<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Models\TrackingModel;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.index');
// });
Route::get('/',[LoginController::class,'login'])->name('login.index');
Route::post('/login',[LoginController::class,'checklogin'])->name('login.check');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::resource('petugas',UserController::class);
Route::resource('wilayah',WilayahController::class);
Route::resource('harga',HargaController::class);
Route::resource('dashboard',DashboardController::class);
Route::get('pengiriman',[PengirimanController::class,'index'])->name('pengiriman.index');
Route::post('pengiriman',[PengirimanController::class,'store'])->name('pengiriman.store');
Route::get('pengiriman/create',[PengirimanController::class,'create'])->name('pengiriman.create');
Route::PUT('pengiriman/{id}',[PengirimanController::class,'update'])->name('pengiriman.update');
Route::DELETE('pengiriman',[PengirimanController::class,'destroy'])->name('pengiriman.destroy');
Route::get('pengiriman/{id}/edit',[PengirimanController::class,'edit'])->name('pengiriman.edit');
Route::Post('pengiriman/cek_harga',[PengirimanController::class,'cek_harga'])->name('pengiriman.cek_harga');
Route::get('cetak_nota/{id}',[PengirimanController::class,'cetak_nota'])->name('pengiriman.cetak_nota');
Route::get('tracking/{id}',[TrackingController::class,'index'])->name('track.index');
Route::get('tracking/tambah/{id}',[TrackingController::class,'create'])->name('track.create');
Route::post('tracking/update',[TrackingController::class,'store'])->name('track.store');
Route::get('cek_resi',[TrackingController::class,'cek_resi'])->name('cek_resi.form');
Route::post('track/cek',[TrackingController::class,'cek'])->name('track.cek');
