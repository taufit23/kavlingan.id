<?php

namespace App\Http\Controllers;

use App\Mail\TransaksiMail;
use App\Models\Data_tanah;
use App\Models\RekeningSistem;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

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

        return view('public.transaksi.checkout', compact('tanah', 'rekeningsistem'))->with('success', 'Permintan transaksi anda sudah di record, SIlahkan mengikuti instuksi untuk menyelesaikan transaksi');
    }
    public function data_transaksi()
    {
        $data_transaksi = Transaksi::with('user_pembeli', 'user_penjual', 'data_tanah')->where('id_pembeli', auth()->user()->id)->get();
        return view('public.transaksi.data_transaksi', compact('data_transaksi'));
    }
    public function batal_tranasksi($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->back()->with('success', 'Transaksi dibvatalkan');
    }
    public function postbuktitransfer(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if ($request->hasFile('bukti_transfer')) {
            $bukti_transfer = $request->file('bukti_transfer');
            $imagename = time() . '.' . $bukti_transfer->extension();
            $filepath       = public_path('images/bukti_transfer');
            $img = Image::make($bukti_transfer->path());
            $img->resize(
                500,
                500,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath . '/' . $imagename);
            $transaksi->update([
                'bukti_transfer' => 'images/bukti_transfer/' . $imagename,
                'status_transaksi' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Bukti berhasil di upload');
    }
    public function data_transaksi_admin()
    {
        $data_transaksi = Transaksi::with('user_pembeli', 'user_penjual', 'data_tanah')->paginate(10);
        return view('private.transaksi.index', compact('data_transaksi'));
    }
    public function accbukti($id)
    {
        $transaksi = Transaksi::with('user_pembeli', 'user_penjual', 'data_tanah')->find($id);
        $transaksi->update([
            'status_transaksi' => 2
        ]);
        $emailpenjual = $transaksi->user_penjual->email;
        $details = [
            'title' => 'Tanah : ' . $transaksi->data_tanah->surat_tanah->nama_pemilik . 'Dibeli oleh' . $transaksi->user_pembeli->name,
            'body' => 'Berikut bukti pembayaran ' . $transaksi->user_pembeli->name . 'Ke Rekening sistem ',
            'img_bukti_tf' => public_path($transaksi->bukti_transfer),
            'data' => 'Mohon kirmkan surat surat tanah terkait ke alamat : ' . $transaksi->user_pembeli->alamat_user->jalan . $transaksi->user_pembeli->alamat_user->desa_kelurahan . $transaksi->user_pembeli->alamat_user->kecamatan . $transaksi->user_pembeli->alamat_user->kota_kabupaten . $transaksi->user_pembeli->alamat_user->provinsi,
            'pesan' => 'Mohon upload bukti pengiriman berkas ke sistem',
            'img_surat_tanah' => $transaksi->data_tanah->Gambarsurat

        ];
        Mail::to("$emailpenjual")->send(new TransaksiMail($details));
        return redirect()->back()->with('gagal', 'Validasi data tanah ditalah dengan variabel informasi tentang surat tanah');
    }
    public function refusebukti($id)
    {
        $transaksi = Transaksi::with('user_pembeli', 'data_tanah')->find($id);
        $transaksi->update([
            'bukti_transfer' => null,
            'status_transaksi' => 0
        ]);
        $email_pembeli = $transaksi->user_pembeli->email;
        $details = [
            'title' => 'Bukti transfer ditolak sistem',
            'body' => 'Jika anda sudah membayar ke rekening sistemm, pastikan bukti transfer yang anda upload benar benar jelas, agar bisa di validasi',
            'img_bukti_tf' => '',
            'data' => '',
            'pesan' => '',
            'img_surat_tanah' => ''
        ];
        Mail::to("$email_pembeli")->send(new TransaksiMail($details));
        return redirect()->back()->with('success', 'Bukti transfer ditolak');
    }
    public function transaksi_penjual()
    {
        $data_transaksi = Transaksi::where('id_penjual', auth()->user()->id)->with('user_pembeli', 'data_tanah')->get();
        return view('public.penjual.transaksi', compact('data_transaksi'));
    }
    public function kirimresi(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);
        if ($request->hasFile('gambar_resi')) {
            $gambar_resi = $request->file('gambar_resi');
            $imagename = time() . '.' . $gambar_resi->extension();
            $filepath       = public_path('images/gambar_resi');
            $img = Image::make($gambar_resi->path());
            $img->resize(
                500,
                500,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            )->save($filepath . '/' . $imagename);
            $transaksi->update([
                'gambar_resi' => 'images/gambar_resi/' . $imagename,
                'status_transaksi' => 3
            ]);
        }
        return redirect()->back()->with('success', 'Resi berhasil di upload');
    }
    public function transaksiselesai($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status_transaksi' => 4
        ]);
    }
}