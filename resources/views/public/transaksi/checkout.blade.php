@extends('public.layouts.master')
@section('title')
    Checkout
@endsection
@section('content')
    <section class="site-section border-bottom" id="beli-section">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row my-1 justify-content-center">
                <div class="col-md-6">
                    @include('vendor.flash_message')
                    <h5>Silahkan tranfer ke rekening tengan sistem, agar transaksi anda ditengahi oleh sistem</h5>
                    <ul>
                        <li>Nama bank :<span class="float-right text-success">{{ $rekeningsistem->nama_bank }}</span></li>
                        <li>Nama di rekening :<span
                                class="float-right text-success">{{ $rekeningsistem->nama_rekening }}</span></li>
                        <li>Nomor rekening :<span
                                class="float-right text-success">{{ $rekeningsistem->nomor_rekening }}</span></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Informasi tanah yang anda beli</h5>
                    <ul>
                        <li>Deksripsi tanah :<span class="float-right text-success">{{ $tanah->deskripsi_tanah }}</span>
                        </li>
                        <li>Jenis surat tanah :<span
                                class="float-right text-success">{{ $tanah->tabel_jenis_surat->nama_jenis_surat }}</span>
                        </li>
                        <li>Nama pemilik tanah :<span
                                class="float-right text-success">{{ $tanah->surat_tanah->nama_pemilik }}</span>
                        </li>
                        <li>Nama penjual tanah :<span class="float-right text-success">{{ $tanah->user->name }}</span>
                        </li>
                        <li>Nomor surat tanah :<span
                                class="float-right text-success">{{ $tanah->surat_tanah->nomor_surat }}</span>
                        </li>
                        <li>Alamat tanah :<span class="float-right text-success">{{ $tanah->alamat_tanah->jalan }},
                                {{ $tanah->alamat_tanah->no_rt }},
                                {{ $tanah->alamat_tanah->no_rw }}, {{ $tanah->alamat_tanah->desa_kelurahan }},
                                {{ $tanah->alamat_tanah->kecamatan }},
                                {{ $tanah->alamat_tanah->kota_kabupaten }},
                                {{ $tanah->alamat_tanah->provinsi }}</span>
                        </li>
                        <li>Harga tanah :<span class="float-right text-success">Rp.
                                {{ number_format($tanah->harga_tanah), 2 }}</span>
                        </li>
                        <strong class="text-danger">Silahkan transfer sejumlah harga tanah ke rekening sistem</strong>
                    </ul>
                    <a href="{{ route('transaksi') }}" class="btn btn-sm btn-block btn-info">Lihat tabel transaksi</a>
                </div>
            </div>
        </div>
    </section>
@stop
