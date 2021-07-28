@extends('public.layouts.master')
@section('title')
    Beli
@endsection
@section('content')
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
                                    Status tanah : <span class="text-warning">{{ $tanah->status_tanah }}</span>
                                    <br>
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
        </div>
    </section>
@stop
