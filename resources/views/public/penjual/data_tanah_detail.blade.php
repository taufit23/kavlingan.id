@extends('public.penjual.layouts.master')
@section('title')
    Nomor Surat @foreach ($data as $d)
        {{ $d->nomor_surat }}
    @endforeach
@endsection

@section('content')
    @foreach ($data as $d)
        <div id="colorlib-main">
            @foreach ($data as $d)
                <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
                    <div class="container-fluid px-0">
                        <div class="row d-flex">
                            <div class="col-md-6 d-flex">
                                <div class="img d-flex align-self-stretch align-items-center js-fullheight"
                                    style="background-image: url({{ url('publik/penjual/images/image_1.jpg') }}); height: 329px;">
                                </div>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="text px-4 pt-5 pt-md-0 px-md-4 pr-md-5 ftco-animate fadeInUp ftco-animated">
                                    <h2 class="mb-4">{{ $d->deskripsi_tanah }}</h2>
                                    <p>Nama Pemilik Tanah : <span class="text-right">{{ $d->nama_pemilik }}</span></p>
                                    <p>Luas Tanah : <span class="text-right">{{ $d->luas_tanah }}</span></p>
                                    <p>Luas Tanah : <span class="text-right">{{ $d->alamat_tanah }}</span></p>
                                    <p>Status Tanah : <span class="text-right">{{ $d->status_tanah }}</span></p>
                                    <p>Harga Tanah : <span class="text-right">{{ $d->harga_tanah }}</span></p>
                                    <p>Harga booking Tanah : <span class="text-right">{{ $d->harga_booking_tanah }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endforeach
        </div>
    @endforeach
@endsection
