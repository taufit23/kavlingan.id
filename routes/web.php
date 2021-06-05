<?php

use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\privat\AdminController;
use App\Http\Controllers\privat\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

// Admin
Route::get('/private_dashboard', [AdminController::class, 'index'])->name('private.dashboard');
Route::get('/private_jenis_surat', [AdminController::class, 'jenis_surat'])->name('private.jenis_surat');
Route::post('/private_jenis_surat', [AdminController::class, 'tambah_jenis_surat'])->name('private.jenis_surat');

Route::get('/private_users', [UsersController::class, 'index'])->name('private.users');
Route::get('/private_users/role_user', [UsersController::class, 'role'])->name('private.users.role_users');
Route::post('/private_users/role_user', [UsersController::class, 'tambah_role'])->name('private.users.role_users.tambah');

// Admin

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/#beli-section', [HomeController::class, 'index']);
Route::get('/beli-section', [HomeController::class, 'beli'])->name('home.beli');
Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');

// penjual
Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
Route::get('/penjual/data_tanah', [PenjualController::class, 'data_tanah'])->name('penjual.data_tanah');
Route::get('/penjual/data_tanah/detail/{id}', [PenjualController::class, 'data_tanah_detail'])->name('penjual.data_tanah.detail');
Route::get('/penjual/data_tanah/jual', [PenjualController::class, 'jual'])->name('penjual.data_tanah.jual');
Route::post('/penjual/data_tanah/jual', [PenjualController::class, 'store'])->name('penjual.data_tanah.jual.store');
Route::post('/penjual/data_tanah/jual_store', [PenjualController::class, 'jual_store'])->name('penjual.data_tanah.jual_store');

// Auth
// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);

// Password Reset Routes...
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);
// Auth

// Route::get('/home', [HomeController::class, 'index'])->name('home');
