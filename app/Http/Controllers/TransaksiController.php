<?php

namespace App\Http\Controllers;

use App\Models\Data_tanah;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($id_tanah, $id_user)
    {
        $tanah = Data_tanah::with('user', 'Alamat_tanah', 'Gambarsurat', 'Gambarbidangtanah', 'Surat_tanah', 'Tabel_jenis_surat')->find($id_tanah);

        return view('public.transaksi.checkout', compact('tanah'));
    }
}