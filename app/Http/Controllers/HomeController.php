<?php

namespace App\Http\Controllers;

use App\Mail\Pengajuan_beli_cashMail;
use App\Models\Data_tanah;
use App\Models\Databank;
use App\Models\Ktp_user;
use App\Models\Tabel_jenis_surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data_ktp = Ktp_user::latest()->pluck('id');
        dd($data_ktp);
        if ($request->has('cari')) {
            $data_tanah =  Data_tanah::select("*")
                ->where('status', 1)
                ->where('alamat', 'LIKE', '%' . $request->cari . '%')
                ->paginate(10000000);
        } else {
            $data_tanah = Data_tanah::where('status', 1)->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('public.index', compact('data_tanah'));
    }
    public function detail_tanah($id)
    {
        $data_tanah = Data_tanah::find($id);
        $user = User::get();
        $jenis_surat = Tabel_jenis_surat::get();
        foreach ($user as $u) {
            if ($data_tanah->id_user == $u->id) {
                $pengguna = $u;
            }
        }
        $data_bank = Databank::with('user')->get();
        $jenis_surat = Tabel_jenis_surat::where('id', Data_tanah::where('id', $id)->pluck('id_jenis_surat'))->get();
        return view('public.detail', compact('data_tanah', 'jenis_surat', 'pengguna', 'data_bank'));
    }
    public function beli()
    {
        $data_tanah = Data_tanah::where('status', 1)->orderBy('created_at', 'desc')->paginate(1);
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
    public function ajukan_beli_cash($id_pembeli, $id_penjual, $id_tanah)
    {
        $pembeli = User::find($id_pembeli);
        $penjual = User::find($id_penjual);
        $tanah = Data_tanah::find($id_tanah);
        $details = [
            'title' => 'Tanah : ' . $tanah->nama_pemilik,
            'body' => 'Tanah anda ditawar oleh' . $pembeli->name, 'Untuk pembayaran cash, Silahkan hubungi melalui pembeli melalui chat',
            'data' => 'Untuk menuju halaman chat : ',
            'pesan' => '--'
        ];
        Mail::to("$penjual->email")->send(new Pengajuan_beli_cashMail($details));
        return redirect()->back()->with('sucess', 'Pengajuan pembelian cash anda sudah disampaikan ke penjual, mohon tunggu infomasi berikutnya melalui chat');
    }
    public function ajukan_kredit_tanah($id_pembeli, $id_penjual, $id_tanah)
    {
        $pembeli = User::find($id_pembeli);
        $penjual = User::find($id_penjual);
        $admin   = User::find(1);
        $tanah = Data_tanah::find($id_tanah);
        $details = [
            'title' => 'Tanah : ' . $tanah->nama_pemilik,
            'body' => 'Tanah yang dijual oleh : ' . $penjual->name, 'ingin di kredit oleh : ' . $pembeli->name, 'Arahkan ke bank rekomendasi?',
            'data' => 'Untuk menuju halaman chat : ',
            'pesan' => '--'
        ];
        Mail::to("$admin->email")->send(new Pengajuan_beli_cashMail($details));
        return redirect()->back()->with('sucess', 'Pengajuan kredit anda sudah disampaikan kepada admin, silahkan menunggu balasan admin melalui chat.');
    }
}