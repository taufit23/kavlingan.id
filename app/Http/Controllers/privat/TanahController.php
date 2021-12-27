<?php

namespace App\Http\Controllers\privat;

use App\Http\Controllers\Controller;
use App\Mail\Validasi_tanah;
use App\Mail\Validasi_tanahMail;
use App\Models\Alamat_tanah;
use App\Models\Data_tanah;
use App\Models\Gambarbidangtanah;
use App\Models\Gambarsurat;
use App\Models\Tabel_jenis_surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

class TanahController extends Controller
{
    public function jenis_surat(Request $request)
    {
        return view('private.tanah.jenis_surat', compact('tabel_jenis_surat'));
    }
    public function tambah_jenis_surat(Request $request)
    {
        $request->validate([
            'nama_jenis_surat' => 'required|string',
            'keterangan_jenis_surat' => 'required|string',
        ]);
        Tabel_jenis_surat::create([
            'nama_jenis_surat'          => $request->nama_jenis_surat,
            'keterangan_jenis_surat'    => $request->keterangan_jenis_surat,
        ]);
        return redirect()->route('private.jenis_surat')->with('success', 'Jenis sura ditambahkan!!');
    }
    public function data_tanah()
    {
        $data_tanah = Data_tanah::orderBy('created_at', 'desc')->with(
            'tabel_jenis_surat',
            'surat_tanah',
            'alamat_tanah',
            'Gambarsurat',
            'Gambarbidangtanah'
        )->paginate(25);
        $jumlah_data_tanah = Data_tanah::count();
        $jumlah_data_tanah_tervalidasi = Data_tanah::where('status', 1)->count();
        $jumlah_data_tanah_belum_valid = Data_tanah::where('status', null)->count();
        $jumlah_data_tanah_validasi_ditolak = Data_tanah::where('status', 0)->count();
        return view('private.tanah.data_tanah', compact(
            'data_tanah',
            'jumlah_data_tanah',
            'jumlah_data_tanah_tervalidasi',
            'jumlah_data_tanah_belum_valid',
            'jumlah_data_tanah_validasi_ditolak',
        ));
    }
    public function detail_tanah($id)
    {
        $tanah = Data_tanah::where('id', $id)->with(
            'Tabel_jenis_surat',
            'Surat_tanah',
            'Gambarbidangtanah',
            'Gambarsurat',
            'Alamat_tanah',
            'user'
        )->get();

        return view('private.tanah.detail_tanah', compact(
            'tanah'
        ));
    }
    public function tolak_nomor_surat($id, $id_pengguna)
    {
        $tanah = Data_tanah::find($id);
        $pengguna = User::find($id_pengguna);
        Gambarsurat::where('id_data_tanah', $tanah->id)->delete();
        $tanah->Surat_tanah->delete();
        $tanah->update(['id_surat_tanah' => null, 'id_jenis_surat' => null, 'status' => 0]);
        $details = [
            'title' => 'Tanah : ' . $tanah->nama_pemilik,
            'body' => '',
            'data' => 'Informasi tentang surat tanah anda ditolak oleh admin, silahkan masukan ulang dengan informasi yang lebih jelas',
            'pesan' => '--'
        ];
        Mail::to("$pengguna->email")->send(new Validasi_tanahMail($details));
        return redirect()->back()->with('gagal', 'Validasi data tanah ditalah dengan variabel informasi tentang surat tanah');
    }
    public function tolak_gambar_bidang_tanah($id, $id_pengguna)
    {
        $tanah = Data_tanah::find($id);
        $pengguna = User::find($id_pengguna);
        Gambarbidangtanah::where('id_data_tanah', $tanah->id)->delete();
        $tanah->update(['status' => 0]);
        $details = [
            'title' => 'Tanah : ' . $tanah->nama_pemilik,
            'body' => '',
            'data' => 'Gambar bidang tanah ditolak, silahkan upload ulang melalui halaman edit tanah yang anda miliki',
            'pesan' => '--'
        ];
        Mail::to("$pengguna->email")->send(new Validasi_tanahMail($details));
        return redirect()->back()->with('gagal', 'Gambar bidang tanah telah di tolak, pastikan anda menekan tombol tolak validasi untuk mengingatkan penjual');
    }
    public function terima_validasi_tanah($id, $id_pengguna)
    {
        $tanah = Data_tanah::find($id);
        $pengguna = User::find($id_pengguna);
        $tanah->update(['status' => 1]);
        $details = [
            'title' => 'Tanah : ' . $tanah->nama_pemilik,
            'body' => '',
            'data' => 'Validasi tanah diterima',
            'pesan' => 'data tanah anda sudah dikomersialisasikan ke pembeli.'
        ];
        Mail::to("$pengguna->email")->send(new Validasi_tanahMail($details));
        return redirect()->back()->with('success', 'Validasi diterima');
    }









    // public function validasi_tanah()
    // {
    //     $jumlah_data_tanah = Data_tanah::count();
    //     $jumlah_data_tanah_tervalidasi = Data_tanah::where('status', 1)->count();
    //     $jumlah_data_tanah_belum_valid = Data_tanah::where('status', null)->count();
    //     $jumlah_data_tanah_validasi_ditolak = Data_tanah::where('status', 0)->count();
    //     $data_tanah_belum_valid = Data_tanah::where('status', 0)->orwhereNull('status')->orderBy('created_at', 'desc')->get();
    //     $user = User::get();
    //     $jenis_surat = Tabel_jenis_surat::get();
    //     return view('private.tanah.validasi_tanah', compact(
    //         'jumlah_data_tanah',
    //         'jumlah_data_tanah_tervalidasi',
    //         'jumlah_data_tanah_belum_valid',
    //         'jumlah_data_tanah_validasi_ditolak',
    //         'data_tanah_belum_valid',
    //         'user',
    //         'jenis_surat'
    //     ));
    // }

    // public function tolak_gambar_surat($id, $id_pengguna)
    // {
    //     $tanah = Data_tanah::find($id);
    //     $pengguna = User::find($id_pengguna);
    //     $tanah->update(['gambar_surat' => null]);
    //     $details = [
    //         'title' => 'Tanah : ' . $tanah->nama_pemilik,
    //         'body' => '',
    //         'data' => 'Gambar surat ditolak, silahkan upload ulang melalui halaman edit tanah yang anda miliki',
    //         'pesan' => '--'
    //     ];
    //     Mail::to("$pengguna->email")->send(new Validasi_tanahMail($details));
    //     return redirect()->back()->with('gagal', 'Gambar surat telah di tolak, pastikan anda menekan tombol tolak validasi untuk mengingatkan penjual');
    // }


    // public function tolak_validasi_tanah($id, $id_pengguna)
    // {
    //     $tanah = Data_tanah::find($id);
    //     $pengguna = User::find($id_pengguna);
    //     $tanah->update(['status' => 0]);
    //     $details = [
    //         'title' => 'Tanah : ' . $tanah->nama_pemilik,
    //         'body' => '',
    //         'data' => 'Validasi tanah ditolak',
    //         'pesan' => 'Silahkan lengkapi data tanah yang tidak valid, sudah ditandai oleh admin pada halaman detail tanah anda.'
    //     ];
    //     Mail::to("$pengguna->email")->send(new Validasi_tanahMail($details));
    //     return redirect()->back()->with('gagal', 'Validasi tanah ditolak');
    // }
}
