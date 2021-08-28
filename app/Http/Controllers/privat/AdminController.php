<?php

namespace App\Http\Controllers\privat;

use App\Http\Controllers\Controller;
use App\Models\Data_tanah;
use App\Models\Tabel_jenis_surat;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlah_data_tanah = Data_tanah::count();
        $jumlah_data_tanah_tervalidasi = Data_tanah::where('status', 1)->count();
        $jumlah_data_tanah_belum_valid = Data_tanah::where('status', null)->count();
        $jumlah_data_tanah_validasi_ditolak = Data_tanah::where('status', 0)->count();
        
        $jumlah_pengguna = User::count();
        $jumlah_pengguna_tervalidasi = User::where('status', 1)->count();
        $jumlah_pengguna_belum_valid = User::where('status', null)->count();
        $jumlah_pengguna_validasi_ditolak = User::where('status', 0)->count();

        $jumlah_pengguna_pembeli = User::where('role', 'Pembeli' )->count();
        $jumlah_pengguna_pembeli_tervalidasi = User::where('role', 'Pembeli')->where('status', 1)->count();
        $jumlah_pengguna_pembeli_belum_valid = User::where('role', 'Pembeli')->where('status', null)->count();
        $jumlahpengguna_pembeli_validasi_ditolak = User::where('role', 'Pembeli')->where('status', 0)->count();

        $jumlah_pengguna_penjual = User::where('role', 'Penjual' )->count();
        $jumlah_pengguna_penjual_tervalidasi = User::where('role', 'Penjual')->where('status', 1)->count();
        $jumlah_pengguna_penjual_belum_valid = User::where('role', 'Penjual')->where('status', null)->count();
        $jumlahpengguna_penjual_validasi_ditolak = User::where('role', 'Penjual')->where('status', 0)->count();

        return view('private.index', compact(
            'jumlah_data_tanah',
            'jumlah_data_tanah_tervalidasi',
            'jumlah_data_tanah_belum_valid',
            'jumlah_data_tanah_validasi_ditolak',
            'jumlah_pengguna',
            'jumlah_pengguna_tervalidasi',
            'jumlah_pengguna_belum_valid',
            'jumlah_pengguna_validasi_ditolak',
            'jumlah_pengguna_pembeli',
            'jumlah_pengguna_pembeli_tervalidasi',
            'jumlah_pengguna_pembeli_belum_valid',
            'jumlahpengguna_pembeli_validasi_ditolak',
            'jumlah_pengguna_penjual',
            'jumlah_pengguna_penjual_tervalidasi',
            'jumlah_pengguna_penjual_belum_valid',
            'jumlahpengguna_penjual_validasi_ditolak',
    ));
    }
    
}
