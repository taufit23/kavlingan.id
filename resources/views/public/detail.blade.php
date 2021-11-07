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
                        <a href="/messanger" target="blank"
                            class="mt-2 float-right btn btn-block btn-outline-info">Negosiasi &
                            chat</a>
                        @guest
                            <a href="{{ route('login') }}"
                                class="mt-2 mx-1 float-right btn btn-block btn-outline-success">Beli
                                tanah</a>
                        @else
                            <a href="/{{ auth()->user()->id }}/beli_tanah/{{ $pengguna->id }}/{{ $data_tanah->id }}"
                                class="mt-2 mx-1 float-right btn btn-block btn-outline-success">Beli
                                tanah</a>
                        @endguest

                        <button type="button" class="mt-2 mx-1 float-right btn btn-block btn-outline-secondary"
                            data-toggle="modal" data-target="#exampleModalCenter">
                            Rekomendasi bank kredit
                        </button>
                        {{-- <a href="/{{ auth()->user()->id }}/ajukan_kredit_tanah/{{ $pengguna->id }}/{{ $data_tanah->id }}"
                            class="mt-2 mx-1 float-right btn btn-block btn-outline-secondary">Ajukan
                            kredit</a> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Rekomendasi bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($data_bank as $bank)
                        <ul class="list-group mt-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <img class="img img-fluid" width="100" src="{{ $bank->logo_bank }}" alt="">
                                <span class="badge badge-primary">{{ $bank->nama_bank }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Contact bank
                                <span class="badge badge-primary">{{ $bank->contact_bank }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Link maps bank
                                <span class="badge badge-primary"><a href="{{ $bank->link_maps_bank }}"
                                        class="text-dark">Google maps Bank {{ $bank->nama_bank }}</a></span>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
