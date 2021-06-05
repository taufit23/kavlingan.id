<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Tabel_role;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Tabel_role::where('nama_role', '!=', 'Admin' )->get();
        return view('auth.register', compact('role'));
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
            'username'              => 'required|min:4|unique:users,username',
            'name'                  => 'required|min:4|max:35',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed',
            'role'                  => 'required|integer',
        ];
  
        $messages = [
            'username.required'     => 'Nama pengguna wajub diisi',
            'username.min'          => 'Nama pengguna terlalu pendek, Milimal 4 karakter',
            'username.unique'       => 'Nama pengguna sudah digunakan',
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
        $user = new User;
        $user->username = ucwords(strtolower($request->username));
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role;
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
  
        if($simpan){
            return redirect()->route('login')->with('sucess', 'Anda berhasil mendaftar, silahkan login');
        } else {
            return redirect()->route('register')->with('errors', 'Pendaftaran gagal, silahkan ulangi');
        }
    }
}
