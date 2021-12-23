<?php

namespace App\Http\Controllers;

use App\Models\Data_tanah;
use App\Models\RekeningSistem;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $transaksi = new Transaksi();
        $transaksi->id_pembeli = $request->id_pembeli;
        $transaksi->id_penjual = $request->id_penjual;
        $transaksi->id_tanah = $request->id_tanah;
        $transaksi->save();
        $tanah = Data_tanah::with('user', 'Alamat_tanah', 'Gambarsurat', 'Gambarbidangtanah', 'Surat_tanah', 'Tabel_jenis_surat')->find($request->id_tanah);
        $rekeningsistem = RekeningSistem::find(1);

        return view('public.transaksi.checkout', compact('tanah', 'rekeningsistem'))->with('sucess', 'Permintan transaksi anda sudah di record, SIlahkan mengikuti instuksi untuk menyelesaikan transaksi');
    }
    public function data_transaksi()
    {
        $data_transaksi = Transaksi::with('user_pembeli', 'user_penjual', 'data_tanah')->where('id_pembeli', auth()->user()->id)->get();
        // dd($data_transaksi);
        return view('public.transaksi.data_transaksi', compact('data_transaksi'));
    }
    public function batal_tranasksi($id)
    {
        $transaksi = Transaksi::find($id);
        dd($transaksi);
    }
}