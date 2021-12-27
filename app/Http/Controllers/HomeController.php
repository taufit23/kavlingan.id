<?php

namespace App\Http\Controllers;

use App\Mail\Pengajuan_beli_cashMail;
use App\Models\Alamat_tanah;
use App\Models\Data_tanah;
use App\Models\Databank;
use App\Models\Ktp_user;
use App\Models\Tabel_jenis_surat;
use App\Models\User;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $data_tanah = Data_tanah::where('status', 1)
                ->whereRelation('Alamat_tanah', 'kecamatan', 'LIKE', '%' . $request->cari . '%')
                ->orwhereRelation('Alamat_tanah', 'jalan', 'LIKE', '%' . $request->cari . '%')
                ->orwhereRelation('Alamat_tanah', 'kota_kabupaten', 'LIKE', '%' . $request->cari . '%')
                ->with(
                    'tabel_jenis_surat',
                    'surat_tanah',
                    'alamat_tanah',
                    'Gambarsurat',
                    'Gambarbidangtanah'
                )->paginate(100);
        } else {
            $data_tanah = Data_tanah::where('status', 1)->with(
                'tabel_jenis_surat',
                'surat_tanah',
                'alamat_tanah',
                'Gambarsurat',
                'Gambarbidangtanah'
            )->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('public.index', compact('data_tanah'));
    }
    public function detail_tanah($id)
    {
        $data_tanah = Data_tanah::where('id', $id)->with(
            'tabel_jenis_surat',
            'surat_tanah',
            'alamat_tanah',
            'Gambarsurat',
            'Gambarbidangtanah'
        )->get();
        $data_bank = Databank::with('user')->get();
        return view('public.detail', compact('data_tanah', 'data_bank'));
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
        return redirect()->back()->with('success', 'Pengajuan pembelian cash anda sudah disampaikan ke penjual, mohon tunggu infomasi berikutnya melalui chat');
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
        return redirect()->back()->with('success', 'Pengajuan kredit anda sudah disampaikan kepada admin, silahkan menunggu balasan admin melalui chat.');
    }
}
