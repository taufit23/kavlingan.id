<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $rules = [
            'email'                 => 'required|email',
            'password'              => 'required|string'
        ];

        $messages = [
            'email.required'        => 'Alamat Email wajib diisi',
            'email.email'           => 'Alamat Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);

        if (Auth::check()) {
            if (Auth::user()->status == null) {
                return redirect()->route('profil')->with('success', 'Silahkan lengkapi data anda');
            } elseif (Auth::user()->status == 0) {
                return redirect()->route('profil')->with('gagal', 'Validasi akun anda ditolak, silahkan edit akun anda!!!');
            } else {
                if (Auth::user()->role == 1) {
                    return redirect()->route('penjual.index')->with('success', 'Login berhasil');
                } elseif (Auth::user()->role == 0) {
                    return redirect()->route('private.dashboard');
                } else {
                    Auth::logout();
                    return redirect()->route('login');
                }
            }
        } else { // false

            //Login Fail
            return redirect()->route('login')->with('gagal', 'Email atau password salah');
        }
    }
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}