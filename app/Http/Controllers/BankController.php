<?php

namespace App\Http\Controllers;

use App\Models\Databank;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback;

class BankController extends Controller
{
    public function data_bank()
    {
        $data_bank = Databank::with('user')->get();
        return view('private.bank.data_bank', compact('data_bank'));
    }
    public function bank_detail($id)
    {
        $bank = Databank::with('user')->find($id);
        return view('private.bank.bank_detail', compact('bank'));
    }
    public function tambah_bank(Request $request)
    {
        $bank = new Databank();
        if ($request->hasFile('logo_bank')) {
            $logo_bank           = $request->file('logo_bank');
            $filename               = time() . '.' . $logo_bank->getClientOriginalExtension();
            $filepath               = public_path('images/logo_bank');
            $logo_bank->move($filepath, $filename);
            $bank->logo_bank    = '/images/logo_bank/' . $filename;
            // $tanah->save();
        }
        $bank->user_id = auth()->user()->id;
        $bank->nama_bank = $request->nama_bank;
        $bank->alamat_bank = $request->alamat_bank;
        $bank->contact_bank = $request->contact_bank;
        $bank->link_maps_bank = $request->link_maps_bank;
        $bank->save();
        return redirect()->route('private.data_bank')->with('sucess', 'Data tanah anda sudah di tambahkan, Sedang di validasi oleh Admin, Mohon tunggu inromasi berikutnya');
    }
}