<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Mail\PendaftaranPenggunaMail;
use App\Models\Tabel_role;
use App\Models\User;
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
        $rules = [
            'name'                  => 'required|min:4|max:35',
            'tempat_lahir'          => 'required|min:4|max:35',
            'tanggal_lahir'         => 'required|min:4|max:35',
            'agama'                 => 'required|integer',
            'jenis_kelamin'         => 'required|string|max:2',
            'no_ktp'                => 'required|min:16|unique:users,no_ktp',
            'pekerjaan'             => 'required|string',
            'alamat_kerja'          => 'required|string',
            'nama_ibu'              => 'required|string',
            'email'                 => 'required|email|unique:users,email',
            'no_hp'                 => 'required|unique:users,no_hp',
            'password'              => 'required|confirmed',
            'role'                  => 'required|string',
            'foto_ktp'              => 'required|mimes:jpg,jpeg,png',
            'avatar'                => 'required|mimes:jpg,jpeg,png',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user                       = new User;
        $user->name                 = ucwords(strtolower($request->name));
        $user->tempat_tanggal_lahir = ucwords(strtolower($request->tempat_lahir . ', ' . $request->tanggal_lahir));
        $user->agama                = $request->agama;
        $user->jenis_kelamin        = $request->jenis_kelamin;
        $user->no_ktp               = ucwords(strtolower($request->no_ktp));
        $user->pekerjaan            = ucwords(strtolower($request->pekerjaan));
        $user->alamat_kerja         = ucwords(strtolower($request->alamat_kerja));
        $user->nama_ibu             = ucwords(strtolower($request->nama_ibu));
        $user->email                = strtolower($request->email);
        $user->no_hp                = $request->no_hp;
        $user->password             = Hash::make($request->password);
        $user->role                 = $request->role;
        
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp       = $request->file('foto_ktp');
    		$filename       = time() . '.' . $foto_ktp->getClientOriginalExtension();
            $filepath       = public_path('images/ktp_user');
            $foto_ktp->move($filepath ,$filename);
    		$user->foto_ktp = '/images/ktp_user/'.$filename;
            $user->save();
        }
        if ($request->hasFile('avatar')) {
            $avatar         = $request->file('avatar');
    		$input['imagename'] = time().'.'.$avatar->extension();$avatar->getClientOriginalExtension();
            $filepath       = public_path('images/user_profil');
            // memperkecil avatar
            
            $img = Image::make($avatar->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath.'/'.$input['imagename']);
            $user->avatar = '/images/user_profil/'.$input['imagename'];
            $user->save();
        }
        $simpan                     = $user->save();
        
        $details = [
            'title' => 'Akun : ' . $request->name,
            'body' => '',
            'data' => 'Akun anda sedang di validasi, Mohon tunggu informasi berikutnya',
        ];
        Mail::to("$request->email")->send(new PendaftaranPenggunaMail($details));
        if($simpan){
            return redirect()->route('login')->with('sucess', 'Anda berhasil mendaftar, Mohon tunggu validasi dari admin, pastikan email anda masih bisa menerima pesan.');
        } else {
            return redirect()->route('register')->with('errors', 'Pendaftaran gagal, silahkan ulangi');
        }
    }
}
