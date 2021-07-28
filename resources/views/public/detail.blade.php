@extends('public.layouts.master')
@section('title')
    Detail tanah
@endsection
@section('content')
    <div class="site-section" id="home-section">
        <div class="container">
            @foreach ($data_tanah as $d)

                <!-- Portfolio Item Heading -->

                <!-- Portfolio Item Row -->
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="col-md-12 my-2">

                            <img class="img-fluid" src="{{ $d->getGambartanah() }}" alt=""
                                style="height: 450px; weight: 300px;">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h1 class="my-4">{{ $d->deskripsi_tanah }}
                            {{-- <small>Secondary Text</small> --}}
                        </h1>
                        <ul>
                            {{-- <li>Nama Penjual <span class="float-right">{{ auth()->user()->name }}</span></li> --}}
                            <li>Nama pemilik <span class="float-right">{{ $d->nama_pemilik }}</span></li>
                            <li>Jenis surat <span class="float-right">
                                    @foreach ($jenis_surat as $jenis)
                                        {{ $jenis->nama_jenis_surat }}
                                    @endforeach
                                </span></li>
                            <li>Nomor surat<span class="float-right">{{ $d->nomor_surat }}</span></li>
                            <li>Alamat tanah<span class="float-right">{{ $d->alamat_tanah }}</span></li>
                            <li>Fasilitas tanah<span class="float-right">{{ $d->fasilitas_tanah }}</span></li>
                            <li>Status tanah<span class="float-right">{{ $d->status_tanah }}</span></li>
                            <li>Harga jual tanah<span class="float-right">Rp.
                                    {{ number_format($d->harga_tanah), 2 }}</span></li>
                            @if ($d->status_tanah == 'BISA_BOOKING')
                                <li>Harga booking<span class="float-right">Rp.
                                        {{ number_format($d->harga_booking_tanah), 2, '.', '.' }}</span></li>

                            @endif
                            <a href="/messanger" target="blank"
                                class="mt-2 float-right btn btn-sm btn-outline-info">nego</a>
                            <a href="#" target="blank" class="mt-2 mx-1 float-right btn btn-sm btn-outline-success">Beli
                                tanah</a>
                            <a href="#" target="blank" class="mt-2 mx-1 float-right btn btn-sm btn-outline-secondary">Ajukan
                                kredit</a>
                        </ul>
                    </div>

                </div>
                <!-- /.row -->

                {{-- <!-- Related Projects Row -->
        <h3 class="my-4">Related Projects</h3>
        
        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>
            
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row --> --}}

        </div>
        <!-- /.container -->
        @endforeach
    </div>
@endsection
