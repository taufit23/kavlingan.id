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
        return view('public.profile_edit');
    }
}
