<?php

use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\RegisterController;
use App\Http\Controllers\Auths\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\privat\AdminController;
use App\Http\Controllers\privat\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Admin
    Route::get('/private_dashboard', [AdminController::class, 'index'])->name('private.dashboard');
    Route::get('/private_jenis_surat', [AdminController::class, 'jenis_surat'])->name('private.jenis_surat');
    Route::post('/private_jenis_surat', [AdminController::class, 'tambah_jenis_surat'])->name('private.jenis_surat');

    Route::get('/private_users', [UsersController::class, 'index'])->name('private.users');
    Route::get('/private_users/role_user', [UsersController::class, 'role'])->name('private.users.role_users');
    Route::post('/private_users/role_user', [UsersController::class, 'tambah_role'])->name('private.users.role_users.tambah');
// Admin

// public / pembeli
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/#beli-section', [HomeController::class, 'index']);
Route::get('/beli-section', [HomeController::class, 'beli'])->name('home.beli');
Route::get('/detail_tanah/{id}', [HomeController::class, 'detail_tanah'])->name('home.detail_tanah');
Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');

// penjual
Route::group(['middleware' => ['auth', 'checkRole:Penjual']], function () {
    Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
    Route::get('/penjual/data_tanah', [PenjualController::class, 'data_tanah'])->name('penjual.data_tanah');
    Route::get('/penjual/data_tanah/detail/{id}', [PenjualController::class, 'data_tanah_detail'])->name('penjual.data_tanah.detail');
    Route::PUT('/{id}/penjual/data_tanah/detail/upload_gambar', [PenjualController::class, 'upload_gambar']);
    Route::PUT('/{id}/penjual/data_tanah/detail/upload_gambar_surat', [PenjualController::class, 'upload_gambar_surat']);
    Route::get('/penjual/data_tanah/jual', [PenjualController::class, 'jual'])->name('penjual.data_tanah.jual');
    Route::post('/penjual/data_tanah/jual', [PenjualController::class, 'store'])->name('penjual.data_tanah.jual.store');
    Route::post('/penjual/data_tanah/jual_store', [PenjualController::class, 'jual_store'])->name('penjual.data_tanah.jual_store');
});

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
Route::group(['middleware' => 'auth'], function () {
// profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profil');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    Route::PUT('/profile/edit{id}', [ProfileController::class, 'update'])->name('profil.update');
    Route::PUT('/{id}/profile/upload_avatar', [ProfileController::class, 'upload_avatar']);

});
//LOCATION DEPENDENT DROPDOWN AXIOS ROUTES
Route::get('/getCities/{id}', [LocationController::class, 'getCities'])->name('city');
Route::get('/getDistricts/{id}', [LocationController::class, 'getDistricts'])->name('district');
Route::get('/getVillages/{id}', [LocationController::class, 'getVillages'])->name('village');
