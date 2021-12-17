<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Alamat_user;
use App\Models\Pekerjaan_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->id_alamat_user != null) {
            $provinsi = Province::where('id', auth()->user()->alamat_user->provinsi)->pluck('name');
            $kota = City::where('id', auth()->user()->alamat_user->kota_kabupaten)->pluck('name');
            $kecamatan = District::where('id', auth()->user()->alamat_user->kecamatan)->pluck('name');
        } else {
            $provinsi = null;
            $kota = null;
            $kecamatan = null;
        }
        if (auth()->user()->id_pekerjaan_user != null) {
            $provinsikerja = Province::where('id', auth()->user()->pekerjaan_user->provinsi)->pluck('name');
            $kotakerja = City::where('id', auth()->user()->pekerjaan_user->kota_kabupaten)->pluck('name');
            $kecamatankerja = District::where('id', auth()->user()->pekerjaan_user->kecamatan)->pluck('name');
        } else {
            $provinsikerja = null;
            $kotakerja = null;
            $kecamatankerja = null;
        }
        return view('public.profile.profile', compact('provinsi', 'kota', 'kecamatan', 'provinsikerja', 'kotakerja', 'kecamatankerja'));
    }
    public function upload_avatar(Request $request, $id)
    {
        $rules = [
            'avatar'              => 'required|unique:users,avatar|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'avatar.required'     => 'wajib diisi jika ingin mengganti',
            'avatar.mimes'       => 'harus berupa gambar, (jpg,jpeg,png)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                unlink(public_path($user->avatar));
            }
            $avatar         = $request->file('avatar');
            $input['imagename'] = time() . '.' . $avatar->extension();
            $avatar->getClientOriginalExtension();
            $filepath       = public_path('images/user_profil');
            // memperkecil avatar
            $img = Image::make($avatar->path());
            $img->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($filepath . '/' . $input['imagename']);
            $user->avatar = '/images/user_profil/' . $input['imagename'];
            $user->save();
            return redirect()->route('profil')->with('sucess', 'Avatar berhasil di update');
        }
    }
    public function upload_ktp(Request $request, $id)
    {
        $rules = [
            'foto_ktp'           => 'required|unique:users,avatar|mimes:jpg,jpeg,png',
        ];

        $messages = [
            'foto_ktp.required'  => 'wajib diisi jika ingin mengganti',
            'foto)ktp.mimes'     => 'harus berupa gambar, (jpg,jpeg,png)',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user = User::find($id);
        if ($request->hasFile('foto_ktp')) {
            if ($user->foto_ktp != null) {
                unlink(public_path($user->foto_ktp));
            }
            $foto_ktp       = $request->file('foto_ktp');
            $filename       = time() . '.' . $foto_ktp->getClientOriginalExtension();
            $filepath       = public_path('images/ktp_user');
            $foto_ktp->move($filepath, $filename);
            $user->foto_ktp = '/images/ktp_user/' . $filename;
            $user->save();
            return redirect()->route('profil')->with('sucess', 'Foto ktp berhasil di update');
        }
    }
    public function addalamat()
    {
        $provinces =
            Province::pluck('name', 'id');
        $cityes =
            City::pluck('name', 'id');
        $district =
            District::pluck('name', 'id');
        $villages =
            Village::pluck('name', 'id');
        return view('public.profile.addalamat', compact('provinces', 'cityes', 'district', 'villages'));
    }
    public function addalamat_store(Request $request)
    {
        // dd($request);
        $rules = [
            'desa_kelurahan' => 'required|min:4',
            'no_rt' => 'required|min:1',
            'no_rw' => 'required|min:1',
            'jalan' => 'required|min:5',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->with('gagal', $validator->errors())->withInput($request->all);
        }
        $alamat = new Alamat_user;
        $alamat->jalan = $request->jalan;
        $alamat->no_rt = $request->no_rt;
        $alamat->no_rw = $request->no_rw;
        $alamat->desa_kelurahan = $request->desa_kelurahan;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kota_kabupaten = $request->kota_kabupaten;
        $alamat->provinsi = $request->provinsi;
        $alamat->save();
        $user =  User::find(auth()->user()->id);
        $user->update(['id_alamat_user' => $alamat->id]);
        return redirect()->route('profil');
    }
    public function addpekerjaan()
    {
        $provinces =
            Province::pluck('name', 'id');
        $cityes =
            City::pluck('name', 'id');
        $district =
            District::pluck('name', 'id');
        $villages =
            Village::pluck('name', 'id');
        return view('public.profile.addpekerjaan', compact('provinces', 'cityes', 'district', 'villages'));
    }
    public function addpekerjaan_store(Request $request)
    {
        $pekerjaan = new Pekerjaan_user;
        $pekerjaan->nama_pekerjaan = $request->nama_pekerjaan;
        $pekerjaan->jalan = $request->jalan;
        $pekerjaan->desa_kelurahan = $request->desa;
        $pekerjaan->kecamatan = $request->kecamatan;
        $pekerjaan->kota_kabupaten = $request->kota_kabupaten;
        $pekerjaan->provinsi = $request->provinsi;
        $pekerjaan->save();
        $user =  User::find(auth()->user()->id);
        $user->update(['id_pekerjaan_user' => $pekerjaan->id]);
        return redirect()->route('profil');
    }
    public function edit()
    {
        $provinces = Province::pluck('name', 'id');
        return view('public.profile_edit', [
            'provinces' => $provinces,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name'                  => 'required|string|max:255|min:4',
            'tempat_tanggal_lahir'  => 'required|string|max:255|min:4',
            'agama'                 => 'required|integer',
            'no_ktp'                => 'required|digits:16',
            'nama_ibu'              => 'required|string',
            'pekerjaan'             => 'required|string',
            'alamat_kerja'          => 'required|string',
            'email'                 => 'required|string|email|max:255|',
            'no_hp'                 => 'required|digits:12',
            'provinces'             => 'requiredIf:users,alamat, "==", null|integer',
            'cities'                => 'requiredIf:users,alamat, "==", null|integer',
            'districts'             => 'requiredIf:users,alamat, "==", null|integer',
            'villages'              => 'requiredIf:users,alamat, "==", null|integer',
            'nama_jln'              => 'requiredIf:users,alamat, "==", null|string',
            'bio'                   => 'requiredIf:users,alamat, "==", null|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $user = User::find($id);
        $alamat = $request->nama_jln . ', ' . Village::where('id', $request->villages)->value('name') . ', ' . District::where('id', $request->districts)->value('name') . ', ' . City::where('id', $request->cities)->value('name') . ', ' . Province::where('id', $request->provinces)->value('name');

        if ($user->alamat == null) {
            $user->update([
                'alamat'                => $alamat,
            ]);
        }
        $user->update([
            'name'                  => $request->name,
            'tempat_tanggal_lahir'  => $request->tempat_tanggal_lahir,
            'agama'                 => $request->agama,
            'no_ktp'                => $request->no_ktp,
            'nama_ibu'              => $request->nama_ibu,
            'pekerjaan'             => $request->pekerjaan,
            'alamat_kerja'          => $request->alamat_kerja,
            'email'                 => $request->email,
            'no_hp'                 => $request->no_hp,
            'status'                => null,
            'bio'                   => $request->bio,
        ]);
        return redirect()->route('login')->with('sucess', 'Profil berhasil di update, silahkan tunggu validasi berikutnya');
    }
}
