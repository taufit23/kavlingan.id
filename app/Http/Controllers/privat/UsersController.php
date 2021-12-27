<?php

namespace App\Http\Controllers\privat;

use App\Http\Controllers\Controller;
use App\Mail\ValidasiPenggunaMail;
use App\Models\Tabel_role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function index()
    {
        $data_user = User::where('role', '!=', 'Admin')->orderBy('created_at', 'desc')->with('ktp_user')->paginate(10);
        return view('private.users.users', compact('data_user'));
    }
    public function detail_pengguna($id)
    {
        $user = User::where('id', $id)->with('alamat_user', 'ktp_user', 'pekerjaan_user')->get();
        return view('private.users.detail_pengguna', compact(
            'user'
        ));
    }
    public function validasi_pengguna()
    {
        $data_user = User::where('role', '!=', 'Admin')->where('status', 0)->orwhereNull('status', null)->orderBy('created_at', 'desc')->take(10)->get();
        return view('private.users.validasi_pengguna', compact('data_user'));
    }
    public function aktifkan_pengguna($id)
    {
        $pengguna = User::find($id);
        $pengguna->update(['status' => 1]);
        $pesan = 'Silahkan melakukan pembelian secara bijak.';
        $details = [
            'title' => 'Akun : ' . $pengguna->email,
            'body' => '',
            'data' => 'telah divalidasi, Silakan melakukan login',
            'pesan' => $pesan,
        ];
        Mail::to("$pengguna->email")->send(new ValidasiPenggunaMail($details));
        return redirect()->back()->with('success', 'Pengguna berhasil di aktifkan');
    }
    public function tolak_aktivasi($id)
    {
        $pengguna = User::find($id);
        $pengguna->update(['status' => 0]);
        $details = [
            'title' => 'Akun : ' . $pengguna->name,
            'body' => '',
            'data' => 'ditolak validasi, Silakan melakukan login & melakukan edit profile',
            'pesan' => 'Kemungkian foto diri atau foto ktp anda tidak jelas, sehingga Admin kesulitan memvalidasi akun anda!'
        ];
        Mail::to("$pengguna->email")->send(new ValidasiPenggunaMail($details));
        return redirect()->back()->with('gagal', 'Aktivasi pengguna ditolak');
    }
    public function role(Request $request)
    {
        if ($request->has('cari')) {
            $tabel_role =  Tabel_role::select("*")
                ->where('id', 'LIKE', '%' . $request->cari . '%')
                ->orWhere('nama_role', 'LIKE', '%' . $request->cari . '%')
                ->paginate(10000000);
        } else {
            $tabel_role = Tabel_role::orderBy('created_at', 'asc')->paginate(25);
        }
        return view('private.users.role', compact('tabel_role'));
    }
    public function tambah_role(Request $request)
    {
        $request->validate([
            'nama_role' => 'required|string',
            'deskripsi_role' => 'required|string',
        ]);
        Tabel_role::create([
            'nama_role'          => $request->nama_role,
            'deskripsi_role'    => $request->deskripsi_role,
        ]);

        return redirect()->route('private.users.role_users')->with('success', 'Role ditambahkan!!');
    }
}