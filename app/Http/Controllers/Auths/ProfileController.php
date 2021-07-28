<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Models\Tabel_role;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // dd($request->all(), $user);
        if ($user->avatar === null) {
            $avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filepath = public_path('/images/user_profil');
            $avatar->move($filepath ,$filename);
    		$user->avatar = '/images/user_profil/'.$filename;
            $user->save();
            return redirect()->back()->with('sucess', 'Profil anda berhasil di update');
        }
        elseif ($user->whereNotNull('avatar')) {
            unlink(public_path($user->avatar));
            $avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filepath = public_path('/images/user_profil');
            $avatar->move($filepath ,$filename);
    		$user->avatar = '/images/user_profil/'.$filename;
            $user->save();
            return redirect()->back()->with('sucess', 'Profil anda berhasil di update');
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
            'username'              => 'required|same:username',
            'name'                  => 'required|string|max:255|min:4',
            'email'                 => 'required|string|email|max:255|',
            'no_hp'                 => 'required|digits:12',
            'provinces'             => 'required|integer',
            'cities'                => 'required|integer',
            'districts'             => 'required|integer',
            'villages'              => 'required|integer',
            'nama_jln'              => 'required|string',
            'bio'                   => 'required|string',
        ];
  
        $messages = [
            'required'     => 'wajib diisi',
            'same'         => 'Jangan mengganti nama pengguna',
            'string'       => 'Harus berupa huruf / angka',
            'email'        => 'email harus valid',
            'max'          => 'Maximal 255 karakter',
            'min'          => 'Minimal 4 karakter',
            'digits'       => 'Maximal 12 karakter',
            'integer'      => 'Berupa bilangan',
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $alamat = $request->nama_jln . ', ' . Village::where('id', $request->villages)->value('name') . ', ' . District::where('id', $request->districts)->value('name') . ', ' . City::where('id', $request->cities)->value('name') . ', ' . Province::where('id', $request->provinces)->value('name');
        // dd($alamat);
        $user = User::find($id);
        // dd($user);
        $user->update([
            'username'      => $request->username,
            'name'          => $request->name,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'alamat'        => $alamat,
            'bio'           => $request->bio,
            ]);
        return redirect()->route('profil')->with('sucess', 'Profil berhasil di update');
    }
}
