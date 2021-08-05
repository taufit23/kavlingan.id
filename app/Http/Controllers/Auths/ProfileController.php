<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
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

        return view('public.profile');
          
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
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                unlink(public_path($user->avatar));
            }
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
  
        if($validator->fails()){
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
            $foto_ktp->move($filepath ,$filename);
    		$user->foto_ktp = '/images/ktp_user/'.$filename;
            $user->save();
            return redirect()->route('profil')->with('sucess', 'Foto ktp berhasil di update');
        }
        
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
  
        if($validator->fails()){
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
