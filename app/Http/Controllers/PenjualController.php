<?php

namespace App\Http\Controllers;

use App\Models\Tabel_jenis_surat;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;

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
        $provinces = Province::pluck('name', 'id');
        $district = District::pluck('name', 'id');
        return view('public.penjual.jual', ['jenis_surat' => $jenis_surat, 'provinces' => $provinces, 'district' => $district
        ]);
    }
    public function store(Request $request)
    {
        $cities = City::where('province_id', $request->get('id'))->pluck('name', 'id');
        return response()->json($cities);
    }
}
