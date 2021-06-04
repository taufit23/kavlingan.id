<?php

namespace App\Http\Controllers\privat;

use App\Http\Controllers\Controller;
use App\Models\Tabel_role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('private.users.users');
    }
    public function role(Request $request)
    {
        if ($request->has('cari')) {
            $tabel_role =  Tabel_role::select("*")
            ->where('id', 'LIKE','%'.$request->cari.'%')
            ->orWhere('nama_role', 'LIKE','%'.$request->cari.'%')
            ->paginate(10000000);
        }
        else{
            $tabel_role = Tabel_role::orderBy('created_at', 'asc')->paginate(25);
        }
        return view('private.users.role', compact('tabel_role'));
    }
    public function tambah_role(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_role' => 'required|string',
            'deskripsi_role' => 'required|string',
        ]);
            Tabel_role::create([
            'nama_role'          => $request->nama_role,
            'deskripsi_role'    => $request->deskripsi_role,
            ]);

         return redirect()->route('private.users.role_users')->with('sucess', 'Role ditambahkan!!');
    }
}
