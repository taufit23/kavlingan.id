<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\privat\AdminController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Route::get('/private_dashboard', [AdminController::class, 'index'])->name('private.dashboard');
Route::get('/private_jenis_surat', [AdminController::class, 'jenis_surat'])->name('private.jenis_surat');
Route::post('/private_jenis_surat', [AdminController::class, 'tambah_jenis_surat'])->name('private.jenis_surat');
// Admin

Route::get('/', [HomeController::class, 'index']);
Route::get('/#beli-section', [HomeController::class, 'index']);
Route::get('/beli-section', [HomeController::class, 'beli'])->name('home.beli');
Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');

// penjual
Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
Route::get('/penjual/data_tanah', [PenjualController::class, 'data_tanah'])->name('penjual.data_tanah');
Route::get('/penjual/data_tanah/jual', [PenjualController::class, 'jual'])->name('penjual.data_tanah.jual');
Route::post('/penjual/data_tanah/jual', [PenjualController::class, 'store'])->name('penjual.data_tanah.jual.store');
