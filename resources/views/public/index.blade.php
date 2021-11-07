@extends('public.layouts.master')
@section('title')
    Home
@endsection
@section('content')
    <div class="site-section" id="home-section">
        <div class="container">
            <div class="row align-items-lg-center">
                <div class="col-md-6 mb-5 mb-lg-0 position-relative">
                    <img src="{{ asset('publik/images/about_1.jpg') }}" class="img-fluid" alt="Image">
                    <div class="experience">
                        <span class="year">Kavlingan.Id</span>
                        <p class="text-white">Tempat anda mencari informasi tanah</p>
                    </div>
                </div>
                <div class="col-md-5 ml-auto">
                    <h3 class="section-sub-title">Tentang </h3>
                    <h2 class="section-title mb-3">Kavlingan.Id</h2>
                    <p class="mb-4">Adalah tempat informasi tanah yang sedang dijual pada <strong>Kabupaten
                            Kampar,
                            Riau, Indonesia</strong></p>
                </div>
            </div>
        </div>
    </div>

    <section class="site-section border-bottom" id="beli-section">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($data_tanah as $tanah)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ $tanah->getGambartanah() }}"
                                style="height: 300px; weight: 450px;" alt="{{ $tanah->deskripsi_tanah }}" />
                            <!-- Product details-->
                            <div class="card-body p-3">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder text-small">{{ $tanah->deskripsi_tanah }}</h5>
                                    {{-- <h5 class="fw-bolder">Nama Penjual : {{ $tanah->user() }}</h5> --}}
                                    <!-- Product price-->
                                    Harga jual : <span class="text-warning">Rp.
                                        {{ number_format($tanah->harga_tanah), 2 }}</span>
                                    <br>
                                    @if ($tanah->status_tanah == 'BISA_BOOKING')
                                        Harga Booking : <span class="text-warning">Rp.
                                            {{ number_format($tanah->harga_tanah), 2 }}</span>
                                    @endif
                                    {{-- <p>diposting pada : {{  }}</p> --}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-2 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('home.detail_tanah', ['id' => $tanah->id]) }}">Lihat detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                {{ $data_tanah->links('pagination::bootstrap-4') }}
                {{-- <a href="{{ route('home.beli') }}" class="btn btn-outline-primary btn-sm">Lihat Lainya</a> --}}
            </div>
        </div>
    </section>





@endsection
