<?php

namespace App\Http\Controllers;

use App\Models\Alamat_user;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\Province;

class AlamatUserController extends Controller
{
    public function provinces()
    {
        return Province::get();
    }

    public function cities(Request $request)
    {
        return City::find($request->id)->pluck('name', 'id');
    }

    public function districts(Request $request)
    {
        return \Laravolt\Indonesia\IndonesiaService::findCity($request->id, ['districts'])->districts->pluck('name', 'id');
    }

    public function villages(Request $request)
    {
        return \Laravolt\Indonesia\IndonesiaService::findDistrict($request->id, ['villages'])->villages->pluck('name', 'id');
    }
}