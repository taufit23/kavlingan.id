<?php

namespace App\Http\Controllers;

use App\Models\Data_tanah;
use App\Models\Tabel_jenis_surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data_tanah = Data_tanah::orderBy('created_at', 'desc')->take(10)->get();
        // $penjual = User::where('id', Data_tanah::where('id', $id)->pluck('id_jenis_surat'))->get();;
        return view('public.index', compact('data_tanah'));
    }
    public function detail_tanah($id)
    {
        $data_tanah = Data_tanah::where('id', $id)->get();
        $jenis_surat = Tabel_jenis_surat::where('id', Data_tanah::where('id', $id)->pluck('id_jenis_surat'))->get();
        return view('public.detail', ['data_tanah' => $data_tanah, 'jenis_surat' => $jenis_surat]);
    }
    public function beli()
    {
        $data_tanah = Data_tanah::orderBy('created_at', 'desc')->get();
        return view('public.beli', compact('data_tanah'));
    }
    public function berita()
    {
        return view('public.berita');
    }
    public function blog()
    {
        return view('public.blog');
    }

}
