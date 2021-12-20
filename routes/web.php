<?php

use App\Http\Controllers\AlamatUserController;
use App\Http\Controllers\Auths\LoginController;
use App\Http\Controllers\Auths\RegisterController;
use App\Http\Controllers\Auths\ProfileController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\privat\AdminController;
use App\Http\Controllers\privat\TanahController;
use App\Http\Controllers\privat\UsersController;
use Illuminate\Support\Facades\Route;


// public / pembeli
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/#beli-section', [HomeController::class, 'index']);
Route::get('/beli-section', [HomeController::class, 'beli'])->name('home.beli');
Route::get('/detail_tanah/{id}', [HomeController::class, 'detail_tanah'])->name('home.detail_tanah');

// Admin
Route::group(['middleware' => ['auth', 'admin: 0']], function () {
    Route::get('/private_dashboard', [AdminController::class, 'index'])->name('private.dashboard');
    Route::get('/private_data_tanah', [TanahController::class, 'data_tanah'])->name('private.data_tanah');
    Route::get('/{id}/private_detail_tanah', [TanahController::class, 'detail_tanah'])->name('private.detail_tanah');

    // validasi
    Route::get('/private_validasi_data_tanah', [TanahController::class, 'validasi_tanah'])->name('private.validasi_tanah');
    Route::post('/{id}/{id_pengguna}/tolak_gambar_surat', [TanahController::class, 'tolak_gambar_surat']);
    Route::post('/{id}/{id_pengguna}/tolak_gambar_bidang_tanah', [TanahController::class, 'tolak_gambar_bidang_tanah']);
    Route::post('/{id}/{id_pengguna}/tolak_nomor_surat', [TanahController::class, 'tolak_nomor_surat']);
    Route::post('/{id}/{id_pengguna}/tolak_validasi_tanah', [TanahController::class, 'tolak_validasi_tanah']);
    Route::post('/{id}/{id_pengguna}/terima_validasi_tanah', [TanahController::class, 'terima_validasi_tanah']);

    // jenis surat
    Route::get('/private_jenis_surat', [TanahController::class, 'jenis_surat'])->name('private.jenis_surat');
    Route::post('/private_jenis_surat', [TanahController::class, 'tambah_jenis_surat'])->name('private.jenis_surat');

    // users
    Route::get('/private_users', [UsersController::class, 'index'])->name('private.users');
    Route::get('/private_users/validasi_pengguna', [UsersController::class, 'validasi_pengguna'])->name('private.users.validasi_pengguna');
    Route::get('/private_users/{id}/detail', [UsersController::class, 'detail_pengguna'])->name('private.users.detail_pengguna');
    Route::post('/private_users/validasi_pengguna/aktifkan_pengguna/{id}', [UsersController::class, 'aktifkan_pengguna']);
    Route::post('/private_users/validasi_pengguna/tolak_aktivasi/{id}', [UsersController::class, 'tolak_aktivasi']);
    Route::get('/private_users/role_user', [UsersController::class, 'role'])->name('private.users.role_users');
    Route::post('/private_users/role_user', [UsersController::class, 'tambah_role'])->name('private.users.role_users.tambah');
    Route::get('/private_bank/data_bank', [BankController::class, 'data_bank'])->name('private.data_bank');
    Route::post('/private_bank/data_bank/tambah', [BankController::class, 'tambah_bank'])->name('private.data_bank.tambah');
    Route::get('/private_bank/{id}/data_bank_detail', [BankController::class, 'bank_detail'])->name('private.data_bank.detail');
});
// Admin end

Route::group(['middleware' => 'auth'], function () {
    // pembeli
    Route::get('/{id_pembeli}/beli_tanah/{id_penjual}/{id_tanah}', [HomeController::class, 'ajukan_beli_cash']);
    Route::get('/{id_pembeli}/ajukan_kredit_tanah/{id_penjual}/{id_tanah}', [HomeController::class, 'ajukan_kredit_tanah']);
    Route::get('/berita', [HomeController::class, 'berita'])->name('home.berita');
    Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
    // penjual dashboard
    Route::get('/penjual', [PenjualController::class, 'index'])->name('penjual.index');
    // penjual data tanah
    Route::get('/penjual/data_tanah', [PenjualController::class, 'data_tanah'])->name('penjual.data_tanah');
    Route::get('/penjual/data_tanah/detail/{id}', [PenjualController::class, 'data_tanah_detail'])->name('penjual.data_tanah.detail');
    // penjual edit tanah
    Route::get('/penjual/data_tanah/edit/{id}', [PenjualController::class, 'data_tanah_edit'])->name('penjual.data_tanah.edit');
    Route::post('/penjual/data_tanah/edit/{id}', [PenjualController::class, 'edit_store'])->name('penjual.data_tanah.edit_store');
    Route::PUT('/{id}/penjual/data_tanah/detail/upload_gambar', [PenjualController::class, 'upload_gambar']);
    Route::PUT('/{id}/penjual/data_tanah/detail/upload_gambar_surat', [PenjualController::class, 'upload_gambar_surat']);
    // penjual input tanah
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
//LOCATION DEPENDENT DROPDOWN AXIOS ROUTES
Route::get('/getCities/{id}', [LocationController::class, 'getCities'])->name('city');
Route::get('/getDistricts/{id}', [LocationController::class, 'getDistricts'])->name('district');
Route::get('/getVillages/{id}', [LocationController::class, 'getVillages'])->name('village');

Route::group(['middleware' => 'auth'], function () {
    // profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profil');
    // Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profil.edit');
    // add alamat
    Route::get('/profile/addalamat', [ProfileController::class, 'addalamat'])->name('profil.addalamat');
    Route::post('/profile/addtalamat/store', [ProfileController::class, 'addalamat_store'])->name('profil.addalamat.store');
    // pekerjaan
    Route::get('/profile/addpekerjaan', [ProfileController::class, 'addpekerjaan'])->name('profil.addpekerjaan');
    Route::post('/profile/addpekerjaan/store', [ProfileController::class, 'addpekerjaan_store'])->name('profil.addpekerjaan.store');

    Route::get('/profile/addalamat/provinces', [ProfileController::class, 'provincessearcha']);
    Route::PUT('/profile/edit{id}', [ProfileController::class, 'update'])->name('profil.update');
    Route::PUT('/{id}/profile/upload_avatar', [ProfileController::class, 'upload_avatar']);
    Route::PUT('/{id}/profile/upload_ktp', [ProfileController::class, 'upload_ktp']);
});