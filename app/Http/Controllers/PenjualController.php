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
        return view('public.penjual.data_tanah');
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
        ]);
            Data_tanah::create([
            'grub'                      => $request->grub,
            'jenis_paket'               => $request->jenis_paket,
            'tanggal_keberangkatan'     => $request->tanggal_keberangkatan,
            'status_pembayaran'         => $request->status_pembayaran,
            'name'                      => $request->name,
            'nik'                       => $request->nik,
            'tempat_lahir'              => $request->tempat_lahir,
            'tanggal_lahir'             => $request->tanggal_lahir,
            'sex'                       => $request->sex,
            'nama_ayah'                 => $request->nama_ayah,
            'email'                     => $request->email,
            'no_telp'                   => $request->no_telp,
            'passpor_name'              => $request->passpor_name,
            'passpor_no'                => $request->passpor_no,
            'place_of_isssued_passpor'  => $request->place_of_isssued_passpor,
            'issued_passpor'            => $request->issued_passpor,
            'expiried_passpor'          => $request->expiried_passpor,
            'provinsi'                  => $request->provinsi,
            'kabupaten_kota'            => $request->kabupaten_kota,
            'kecamatan'                 => $request->kecamatan,
            'desa_kelurahan'            => $request->desa_kelurahan,
            'alamat'                    => $request->alamat,
            ]);

        //  return redirect('dashboard/data_jamaah')->with('sucess', 'Data Jamaah Berhasil DiInput, Lakukan Pengeditan Untuk Input Foto di dalam tombol detail!!!');
    }
    
}
