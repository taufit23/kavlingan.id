<?php

namespace App\Http\Controllers;

use App\Models\Data_tanah;
use App\Models\Tabel_jenis_surat;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class PenjualController extends Controller
{
    public function index()
    {
        return view('public.penjual.index');
    }
    public function data_tanah()
    {
        $data_tanah = Data_tanah::orderBy('created_at', 'desc')->get();
        return view('public.penjual.data_tanah', ['data_tanah' => $data_tanah]);
    }
    public function data_tanah_detail($id)
    {
        $data = Data_tanah::where('id', $id)->get();
        // dd($data);
        return view('public.penjual.data_tanah_detail', ['data' => $data]);
    }
    public function jual()
    {
        $jenis_surat = Tabel_jenis_surat::orderBy('created_at', 'asc')->get();
        $provinsi = Province::where('name', 'RIAU')->pluck('name', 'id');
        $kabupaten = City::where('name', 'KABUPATEN KAMPAR')->pluck('name', 'id');
        // dd($kabupaten);
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
        $request->validate([
            'jenis_surat'           => 'required|integer',
            'nomor_sertifikat'      => 'required|string',
            'nama_pemilik'          => 'required|string',
            'luas_tanah'            => 'required|integer',
            'fasilitas_tanah'       => 'required|string',
            'status_tanah'          => 'required|string',
            'harga_tanah'           => 'required|integer',
            'harga_booking_tanah'   => 'required|integer',
            'provinsi'              => 'required|string',
            'kabupaten'             => 'required|string',
            'districts'             => 'required|integer',
            'villages'              => 'required|integer',
            'nama_jln'              => 'required|string',
            'deskripsi_tanah'       => 'required|string'
        ]);

            $alamat = $request->nama_jln . ', ' . Village::where('id', $request->villages)->value('name') . ', ' . District::where('id', $request->districts)->value('name') . ', ' . $request->kabupaten . ', ' . $request->provinsi;
            
            // dd($request);
            Data_tanah::create([
                'id_user'           => 1,
                'id_jenis_surat'    => $request->jenis_surat,
                'nama_pemilik'      => $request->nama_pemilik,
                'nomor_surat'       => $request->nomor_sertifikat,
                'alamat_tanah'      => $alamat,
                'luas_tanah'        => $request->luas_tanah,
                'fasilitas_tanah'   => $request->fasilitas_tanah,
                'status_tanah'      => $request->status_tanah,
                'harga_tanah'       => $request->harga_tanah,
                'harga_booking_tanah'=> $request->harga_booking_tanah,
                'deskripsi_tanah'         => $request->deskripsi_tanah
            ]);

         return redirect('penjual/data_tanah')->with('sucess', 'Data tanah berhasil ditambahkan, Data tanah anda akan kami iklankan.');
    }
    
}
