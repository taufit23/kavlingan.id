<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Mail\PendaftaranPenggunaMail;
use App\Models\Ktp_user;
use App\Models\Tabel_role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use Symfony\Component\VarDumper\Cloner\Data;

use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Tabel_role::where('nama_role', '!=', 'Admin')->pluck('nama_role', 'deskripsi_role');
        $age = 17;
        $max_date_lahir =
            $max = Carbon::today()->subYears($age)->toDateString();
        return view('auth.register', compact('role', 'max_date_lahir'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name'                  => 'required|min:4|max:35',
            'tempat_lahir'          => 'required|min:4|max:35',
            'tanggal_lahir'         => 'required|min:4|max:35',
            'jenis_kelamin'         => 'required|string|max:2',
            'no_ktp'                => 'required|min:16|unique:ktp_user,no_ktp',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required|unique:users,no_hp',
            'foto_ktp'              => 'required|mimes:jpg,jpeg,png',
            'avatar'                => 'required|mimes:jpg,jpeg,png',
            'password'              => 'required|confirmed',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $ktp_user                   = new Ktp_user;
        $ktp_user->nama_lengkap     = ucwords(strtolower($request->name));
        $ktp_user->tempat_lahir     = ucwords(strtolower($request->tempat_lahir));
        $ktp_user->tanggal_lahir    = $request->tanggal_lahir;
        $ktp_user->jenis_kelamin    = ucwords(strtolower($request->jenis_kelamin));
        $ktp_user->no_ktp           = $request->no_ktp;
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp       = $request->file('foto_ktp');
            $filename       = time() . '.' . $foto_ktp->getClientOriginalExtension();
            $filepath       = public_path('images/ktp_user');
            $foto_ktp->move($filepath, $filename);
            $ktp_user->foto_ktp = '/images/ktp_user/' . $filename;
            $ktp_user->save();
        }
        $id_ktp = $ktp_user->id;
        $user                       = new User;
        $user->name                 = ucwords(strtolower($request->name));
        $user->id_ktp_user          = $id_ktp;
        $user->id_alamat_user       = null;
        $user->id_pekerjaan_user    = null;
        $user->email                = strtolower($request->email);
        $user->no_hp                = $request->no_hp;
        $user->role                 = 1;
        $user->status               = null;
        $user->password             = Hash::make($request->password);
        if ($request->hasFile('avatar')) {
            $avatar         = $request->file('avatar');
            $input['imagename'] = time() . '.' . $avatar->extension();
            $avatar->getClientOriginalExtension();
            $filepath       = public_path('images/user_profil');
            $img = Image::make($avatar->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $user->avatar = '/images/user_profil/' . $input['imagename'];
            $user->save();
        }
        $simpan = $user->save();
        $details = [
            'title' => 'Akun : ' . $request->name,
            'body' => '',
            'data' => 'Silahkan login untuk melengkapi data anda',
        ];
        Mail::to("$request->email")->send(new PendaftaranPenggunaMail($details));
        if ($simpan) {
            return redirect()->route('login')->with('sucess', 'Anda berhasil mendaftar, Silahkan login untuk melengkapi data anda.');
        } else {
            return redirect()->route('register')->with('errors', 'Pendaftaran gagal, silahkan ulangi');
        }
    }
}