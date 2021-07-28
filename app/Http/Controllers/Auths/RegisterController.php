<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Tabel_role;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Tabel_role::where('nama_role', '!=', 'Admin' )->pluck('nama_role', 'deskripsi_role');
        // dd($role);
        $provinces = Province::pluck('name', 'id');
        return view('auth.register', compact('role', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'name'                  => 'required|min:4|max:35',
            'tempat_lahir'          => 'required|min:4|max:35',
            'tanggal_lahir'         => 'required|min:4|max:35',
            'role'                  => 'required|',
            'no_ktp'                => 'required|integer|min:16|unique:users,no_ktp',
            'nama_ibu'              => 'required|string',
            'pekerjaan'             => 'required|string',
            'alamat_tempat_kerja'   => 'required|string',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'foto_ktp'              => 'required|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'name.min'              => 'Nama lengkap minimal 4 karakter',
            'name.max'              => 'Nama lengkap maksimal 35 karakter',
            'email.required'        => 'Alamat Email wajib diisi',
            'email.email'           => 'Alamat Email tidak valid',
            'email.unique'          => 'Alamat Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user                       = new User;
        $user->name                 = ucwords(strtolower($request->name));
        $user->tempat_tanggal_lahir = ucwords(strtolower($request->tempat_lahir . $request->tanggal_lahir));
        $user->tanggal_lahir        = ucwords(strtolower($request->tanggal_lahir));
        $user->role                 = $request->role;
        $user->no_ktp               = ucwords(strtolower($request->no_ktp));
        $user->nama_ibu             = ucwords(strtolower($request->nama_ibu));
        $user->pekerjaan            = ucwords(strtolower($request->pekerjaan));
        $user->alamat_tempat_kerja  = ucwords(strtolower($request->alamat_tempat_kerja));
        $user->email                = strtolower($request->email);
        $user->password             = Hash::make($request->password);

        $user->email_verified_at    = \Carbon\Carbon::now();
        $simpan                     = $user->save();
  
        if($simpan){
            return redirect()->route('login')->with('sucess', 'Anda berhasil mendaftar, silahkan login');
        } else {
            return redirect()->route('register')->with('errors', 'Pendaftaran gagal, silahkan ulangi');
        }
    }
}
