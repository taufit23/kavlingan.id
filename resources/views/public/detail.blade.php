@extends('public.layouts.master')
@section('title')
    Detail tanah
@endsection
@section('content')
    <div class="site-section" id="home-section">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6">
                    <div class="col-md-12 my-2">
                        <img class="img-fluid" src="{{ asset($data_tanah->gambar_surat) }}" alt=""
                            style="height: 450px; weight: 300px;">
                    </div>
                </div>

                <div class="col-md-6">
                    @include('vendor.flash_message');
                    <h1 class="my-4">{{ $data_tanah->deskripsi_tanah }}
                    </h1>
                    <ul>
                        <li>Nama Penjual <span class="float-right">{{ $pengguna->name }}</span></li>
                        <li>Nama pemilik <span class="float-right">{{ $data_tanah->nama_pemilik }}</span></li>
                        <li>Jenis surat <span class="float-right">
                                @foreach ($jenis_surat as $jenis)
                                    {{ $jenis->nama_jenis_surat }}
                                @endforeach
                            </span></li>
                        <li>Nomor surat<span class="float-right">{{ $data_tanah->nomor_surat }}</span></li>
                        <li>Alamat tanah<span class="float-right">{{ $data_tanah->alamat }}</span></li>
                        <li>Fasilitas tanah<span class="float-right">{{ $data_tanah->fasilitas_tanah }}</span></li>
                        <li>Harga jual tanah<span class="float-right">Rp.
                                {{ number_format($data_tanah->harga_tanah), 2 }}</span></li>
                        <a href="/messanger" target="blank" class="mt-2 float-right btn btn-sm btn-outline-info">nego</a>
                        <a href="/{{ auth()->user()->id }}/beli_tanah/{{ $pengguna->id }}/{{ $data_tanah->id }}"
                            class="mt-2 mx-1 float-right btn btn-sm btn-outline-success">Beli
                            tanah</a>
                        <a href="/{{ auth()->user()->id }}/ajukan_kredit_tanah/{{ $pengguna->id }}/{{ $data_tanah->id }}"
                            class="mt-2 mx-1 float-right btn btn-sm btn-outline-secondary">Ajukan
                            kredit</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
