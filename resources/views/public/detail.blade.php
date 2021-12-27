@extends('public.layouts.master')
@section('title')
    Detail tanah
@endsection
@section('content')
    @foreach ($data_tanah as $tanah)
        <div class="site-section" id="home-section">
            <div class="container">
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="col-md-12 my-2">
                            <div id="gambartanah{{ $tanah->id }}" class="carousel slide carousel-fade card-img-top"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($tanah->Gambarbidangtanah as $key => $gambartanah)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($gambartanah->gambar_bidang_tanah) }}"
                                                class="d-block w-100" alt="..." height="250px">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#gambartanah{{ $tanah->id }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#gambartanah{{ $tanah->id }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        @include('vendor.flash_message')
                        <h1 class="my-4">{{ $tanah->deskripsi_tanah }}
                        </h1>
                        <ul>
                            <li>Nama Penjual <span class="float-right">{{ $tanah->user->name }}</span></li>
                            <li>Nama pemilik <span class="float-right">{{ $tanah->surat_tanah->nama_pemilik }}</span>
                            </li>
                            <li>Jenis surat <span class="float-right">
                                    {{ $tanah->tabel_jenis_surat->nama_jenis_surat }}
                                </span></li>
                            <li>Nomor surat<span class="float-right">{{ $tanah->surat_tanah->nomor_surat }}</span></li>
                            <li>Alamat tanah<span class="float-right">
                                    {{ $tanah->alamat_tanah->jalan }}, {{ $tanah->alamat_tanah->no_rt }},
                                    {{ $tanah->alamat_tanah->no_rw }}, {{ $tanah->alamat_tanah->desa_kelurahan }},
                                    {{ $tanah->alamat_tanah->kecamatan }},
                                    {{ $tanah->alamat_tanah->kota_kabupaten }}, {{ $tanah->alamat_tanah->provinsi }}
                                </span>
                            </li>
                            <li>Fasilitas tanah<span class="float-right">{{ $tanah->fasilitas_tanah }}</span>
                            </li>
                            <li>Harga jual tanah<span class="float-right">Rp.
                                    {{ number_format($tanah->harga_tanah), 2 }}</span></li>
                            <button type="button" class="mt-2 mx-1 float-right btn btn-block btn-outline-secondary"
                                data-toggle="modal" data-target="#exampleModalCenter">
                                Rekomendasi bank kredit
                            </button>
                            <a href="{{ route('nego-chat') }}" target="blank"
                                class="mt-2 float-right btn btn-block btn-outline-info @auth
                                    @if (auth()->user()->status == 1)
                                        enabled
                                        @else
                                        disabled
                                    @endif
                                @else
                                    disabled
                                @endauth">Negosiasi
                                &
                                chat</a>
                            <form action="/checkout" method="post">
                                @csrf
                                @auth
                                    @if (auth()->user()->status == 1)
                                        <input type="hidden" name="id_pembeli" value="{{ auth()->user()->id }}">
                                        <input type="hidden" name="id_penjual" value="{{ $tanah->user->id }}">
                                        <input type="hidden" name="id_tanah" value="{{ $tanah->id }}">
                                    @endif
                                @endauth
                                <button type="submit"
                                    class="mt-2 float-right btn btn-block btn-outline-success @auth
                                    @if (auth()->user()->status == 1)
                                        enabled
                                        @else
                                        disabled
                                    @endif
                                    @else
                                    disabled
                                @endauth"
                                    onclick="return confirm('Yakin melakukan transaksi??');">
                                    Beli tanah
                                </button>
                            </form>
                            @auth
                                @if (auth()->user()->status != 1)
                                    <small class="text-danger">Akun anda belum valid, informasi validasi akan dikirimkan ke
                                        email anda</small>
                                @endif
                            @else
                                <small class="text-danger">Harus login terlebih dahulu</small>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
    @endforeach
@endsection
