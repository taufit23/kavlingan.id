<?php

namespace App\Http\Controllers;

use App\Mail\TambahtanahMail;
use App\Models\Data_tanah;
use App\Models\Tabel_jenis_surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Symfony\Component\VarDumper\Cloner\Data;

class PenjualController extends Controller
{
    public function index()
    {
        $jumlah_data_tanah = Data_tanah::where('id_user', auth()->user()->id)->count();
        $jumlah_data_tanah_belum_validasi = Data_tanah::where('id_user', auth()->user()->id)->where('status', null)->count();
        $jumlah_data_tanah_validasi_ditolak = Data_tanah::where('id_user', auth()->user()->id)->where('status', 0)->count();
        $jumlah_data_tanah_telah_valid = Data_tanah::where('id_user', auth()->user()->id)->where('status', 1)->count();
        return view('public.penjual.index', compact(
            'jumlah_data_tanah',
            'jumlah_data_tanah_belum_validasi',
            'jumlah_data_tanah_validasi_ditolak',
            'jumlah_data_tanah_telah_valid'
        ));
    }
    public function data_tanah()
    {
        $data_tanah = Data_tanah::where('id_user', auth()->user()->id)->get();
        
        return view('public.penjual.data_tanah', ['data_tanah' => $data_tanah]);
    }
    public function data_tanah_detail($id)
    {
        $data = Data_tanah::find($id);
        $jenis_surat = Tabel_jenis_surat::find($data->id_jenis_surat);
        return view('public.penjual.data_tanah_detail', compact('data', 'jenis_surat'));
    }
    public function jual()
    {
        $jenis_surat = Tabel_jenis_surat::orderBy('created_at', 'asc')->get();
        $provinsi = Province::where('name', 'RIAU')->pluck('name', 'id');
        $kabupaten = City::where('name', 'KABUPATEN KAMPAR')->pluck('name', 'id');
        $districts = District::where('city_id', '1406')->pluck('name', 'id');
        return view('public.penjual.jual', ['jenis_surat' => $jenis_surat, 'districts' => $districts, 'provinsi' => $provinsi, 'kabupaten' => $kabupaten,
        ]);
    }
    public function store(Request $request)
    {
        $villages = Village::where('district_id', $request->get('id'))->pluck('name', 'id');
        return response()->json($villages);
    }
    public function jual_store(Request $request)
    {
        $rules = [
            'jenis_surat'           => 'required|integer',
            'nomor_sertifikat'      => 'required|string|unique:data_tanah,nomor_surat',
            'nama_pemilik'          => 'required|string',
            'panjang_tanah'         => 'required|integer',
            'lebar_tanah'           => 'required|integer',
            'fasilitas_tanah'       => 'required|string',
            'harga_tanah'           => 'required|integer',
            'provinsi'              => 'required|string',
            'kabupaten'             => 'required|string',
            'districts'             => 'required|integer',
            'villages'              => 'required|integer',
            'nama_jln'              => 'required|string',
            'deskripsi_tanah'       => 'required|string',
            'gambar_surat'          => 'required|mimes:jpg,jped,png',
            'gambar_bidang_tanah'   => 'required|mimes:jpg,jped,png'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $alamat = $request->nama_jln . ', ' . Village::where('id', $request->villages)->value('name') . ', ' . District::where('id', $request->districts)->value('name') . ', ' . $request->kabupaten . ', ' . $request->provinsi;
        // dd($validator);
        $tanah = new Data_tanah();
        $tanah->id_user         = auth()->user()->id;
        $tanah->id_jenis_surat  = $request->jenis_surat;
        $tanah->nomor_surat     = $request->nomor_sertifikat;
        $tanah->nama_pemilik    = $request->nama_pemilik;
        $tanah->panjang_tanah   = $request->panjang_tanah;
        $tanah->lebar_tanah     = $request->lebar_tanah;
        $tanah->fasilitas_tanah = $request->fasilitas_tanah;
        $tanah->harga_tanah     = $request->harga_tanah;
        $tanah->alamat          = $alamat;
        $tanah->deskripsi_tanah = $request->deskripsi_tanah;
        if ($request->hasFile('gambar_surat')) {
            $gambar_surat           = $request->file('gambar_surat');
            $filename               = time() . '.' . $gambar_surat->getClientOriginalExtension();
            $filepath               = public_path('images/gambar_surat');
            $gambar_surat->move($filepath ,$filename);
            $tanah->gambar_surat    = '/images/gambar_surat/'.$filename;
            // $tanah->save();
        }
        if ($request->hasFile('gambar_bidang_tanah')) {
            $gambar_bidang_tanah    = $request->file('gambar_bidang_tanah');
            $filename               = time() . '.' .$gambar_bidang_tanah->getClientOriginalExtension();
            $filepath               = public_path('images/gambar_tanah');
            $gambar_bidang_tanah->move($filepath ,$filename);
            $tanah->gambar_bidang_tanah = '/images/gambar_tanah/'.$filename;
            // $tanah->save();
        }
        $simpan = $tanah->save();

        $details = [
            'title' => 'data_tanah : ' . $request->deskripsi_tanah,
            'body' => '',
            'data' => 'data tanah anda sedang di validasi, Mohon tunggu informasi berikutnya',
        ];
        Mail::to(auth()->user()->email)->send(new TambahtanahMail($details));
        if($simpan){
            return redirect()->route('penjual.data_tanah')->with('sucess', 'Data tanah anda sudah di tambahkan, Sedang di validasi oleh Admin, Mohon tunggu inromasi berikutnya');
        } else {
            return redirect()->route('penjual.data_tanah.jual')->with('errors', 'Pendaftaran gagal, silahkan ulangi');
        }
    }
    public function data_tanah_edit($id)
    {
        $jenis_surat = Tabel_jenis_surat::orderBy('created_at', 'asc')->get();
        $provinsi = Province::where('name', 'RIAU')->pluck('name', 'id');
        $kabupaten = City::where('name', 'KABUPATEN KAMPAR')->pluck('name', 'id');
        $districts = District::where('city_id', '1406')->pluck('name', 'id');
        $data = Data_tanah::find($id);
        
        $harga_tanah = ($data->harga_tanah);
        return view('public.penjual.edit_tanah',
        compact('jenis_surat', 'provinsi', 'kabupaten', 'districts', 'data'));
    }
    public function edit_store(Request $request, $id)
    {
        $tanah = Data_tanah::find($id);
        $rules = [
            'jenis_surat'           => 'integer',
            'nomor_sertifikat'      => 'string',
            'nama_pemilik'          => 'string',
            'panjang_tanah'         => 'integer',
            'lebar_tanah'           => 'integer',
            'fasilitas_tanah'       => 'string',
            'harga_tanah'           => 'integer',
            'provinsi'              => 'required_if:data_tanah:alamat, null|string',
            'kabupaten'             => 'required_if:data_tanah:alamat, null|string',
            'districts'             => 'required_if:data_tanah:alamat, null|integer',
            'villages'              => 'required_if:data_tanah:alamat, null|integer',
            'nama_jln'              => 'required_if:data_tanah:alamat, null|string',
            'deskripsi_tanah'       => 'required|string',
            'gambar_surat_new'          => 'required_if:data_tanah:gambar_surat, null|mimes:jpg,jpeg,png',
            'gambar_bidang_tanah_new'   => 'required_if:data_tanah:gambar_bidang_tanah, null|mimes:jpg,jpeg,png'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        $tanah->update([
            'id_jenis_surat'    => $request->jenis_surat,
            'nomor_surat'       => $request->nomor_sertifikat,
            'nama_pemilik'      => $request->nama_pemilik,
            'panjang_tanah'     => $request->panjang_tanah,
            'lebar_tanah'       => $request->lebar_tanah,
            'fasilitas_tanah'   => $request->fasilitas_tanah,
            'harga_tanah'       => $request->harga_tanah,
            'alamat'            => $request->alamat,
            'deskripsi_tanah'   => $request->deskripsi_tanah,
            'status'            => null,
        ]);
        if ($request->hasFile('gambar_surat_new')) {
            $gambar_surat           = $request->file('gambar_surat_new');
            $filename               = time() . '.' . $gambar_surat->getClientOriginalExtension();
            $filepath               = public_path('images/gambar_surat');
            $gambar_surat->move($filepath ,$filename);
            $tanah->gambar_surat    = '/images/gambar_surat/'.$filename;
            $tanah->save();
        }
        if ($request->hasFile('gambar_bidang_tanah_new')) {
            $gambar_bidang_tanah    = $request->file('gambar_bidang_tanah_new');
            $filename               = time() . '.' .$gambar_bidang_tanah->getClientOriginalExtension();
            $filepath               = public_path('images/gambar_tanah');
            $gambar_bidang_tanah->move($filepath ,$filename);
            $tanah->gambar_bidang_tanah = '/images/gambar_tanah/'.$filename;
            $tanah->save();
        }
        
        return redirect()->route('penjual.data_tanah')->with('sucess', 'data tanah anda berhasil di edit, silahkan tunggu infomasi berikutnya');
        
    }
    public function upload_gambar(Request $request, $id)
    {
        $rules = [
            'gambar_bidang_tanah'              => 'required|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'gambar_bidang_tanah.required'      => 'wajib diisi jika ingin mengganti',
            'gambar_bidang_tanah.mimes'         => 'harus berupa gambar, (jpg,jpeg,png)',
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $tanah = Data_tanah::find($id);
        
        if ($tanah->gambar_bidang_tanah === null) {
            $gambar = $request->file('gambar_bidang_tanah');
    		$filename = time() . '.' . $gambar->getClientOriginalExtension();
            $filepath = public_path('/images/gambar_tanah');
            $gambar->move($filepath ,$filename);
    		$tanah->gambar_bidang_tanah = '/images/gambar_tanah/'.$filename;
            $tanah->save();
            return redirect()->back()->with('sucess', 'Gambar berhasil di update');
        }
        elseif ($tanah->whereNotNull('gambar_bidang_tanah')) {
            unlink(public_path($tanah->gambar_bidang_tanah));
            $gambar = $request->file('gambar_bidang_tanah');
    		$filename = time() . '.' . $gambar->getClientOriginalExtension();
            $filepath = public_path('/images/user_profil');
            $gambar->move($filepath ,$filename);
    		$tanah->gambar_bidang_tanah = '/images/gambar_tanah/'.$filename;
            $tanah->save();
            return redirect()->back()->with('sucess', 'Gambar berhasil di update');
        }
    }
    public function upload_gambar_surat(Request $request, $id)
    {
        $rules = [
            'gambar_surat'              => 'required|mimes:jpg,jpeg,png',
        ];
        $messages = [
            'gambar_surat.required'      => 'wajib diisi jika ingin mengganti',
            'gambar_surat.mimes'         => 'harus berupa gambar, (jpg,jpeg,png)',
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $tanah = Data_tanah::find($id);
        // dd($request->all(), $tanah);
        if ($tanah->gambar_surat === null) {
            $gambar = $request->file('gambar_surat');
    		$filename = time() . '.' . $gambar->getClientOriginalExtension();
            $filepath = public_path('/images/gambar_surat');
            $gambar->move($filepath ,$filename);
    		$tanah->gambar_surat = '/images/gambar_surat/'.$filename;
            $tanah->save();
            return redirect()->back()->with('sucess', 'Gambar berhasil di update');
        }
    }
    
}
