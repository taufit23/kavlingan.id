<?php

namespace App\Http\Controllers\privat;

use App\Http\Controllers\Controller;
use App\Models\Tabel_jenis_surat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('private.index');
    }
    public function jenis_surat(Request $request)
    {
        if ($request->has('cari')) {
            $tabel_jenis_surat =  Tabel_jenis_surat::select("*")
            ->where('id', 'LIKE','%'.$request->cari.'%')
            ->orWhere('nama_jenis_surat', 'LIKE','%'.$request->cari.'%')
            ->paginate(10000000);
        }
        else{
            $tabel_jenis_surat = Tabel_jenis_surat::orderBy('created_at', 'asc')->paginate(25);
        }

        return view('private.surat-surat.jenis_surat', compact('tabel_jenis_surat'));
    }
    public function tambah_jenis_surat(Request $request)
    {
        // dd($request);
        $request->validate([
            'nama_jenis_surat' => 'required|string',
            'keterangan_jenis_surat' => 'required|string',
        ]);
            Tabel_jenis_surat::create([
            'nama_jenis_surat'          => $request->nama_jenis_surat,
            'keterangan_jenis_surat'    => $request->keterangan_jenis_surat,
            ]);

         return redirect()->route('private.jenis_surat')->with('sucess', 'Jenis sura ditambahkan!!');
    }
}
