@extends('public.penjual.layouts.master')
@section('title')
    Data Tanah
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-auto mx-auto">
                <div class="row my-2">
                    <div class="col-lg-8 order-lg-2">
                        <a href="{{ route('penjual.data_tanah.jual') }}" class="btn btn-sm btn-block btn-info my-2">Tambah
                            Tanah</a>
                        <div class="row pt-md-4">
                            <div class="col-md-12">
                                @foreach ($data_tanah as $tanah)
                                    <div class="blog-entry-2">
                                        <a href="{{ route('penjual.data_tanah.detail', $tanah->id) }}"
                                            class="img-fluid img-thumbnail"><img src="{{ $tanah->getGambartanah() }}"
                                                alt="" style="weight: 450px; height: 300px;"></a>

                                        <div class="text pt-4">
                                            <h3 class="mb-4"><a href="#">{{ $tanah->deskripsi_tanah }}</a></h3>
                                            <div class="author mb-4 d-flex align-items-center">
                                                <div class="ml-3 info">
                                                    <h3><a href="#">Luas Tanah</a>, <span>{{ $tanah->luas_tanah }}
                                                            H.a</span></h3>
                                                    <h3><a href="#">Tanggal Posting</a>,
                                                        <span>{{ date($tanah->created_at) }}</span>
                                                    </h3>
                                                </div>
                                                <a href="{{ route('penjual.data_tanah.detail', $tanah->id) }}"
                                                    class="btn btn-sm btn-outline-primary mx-1">Detail</a>
                                                <a id="bantuan_input" title="Iklankan di media sosial sendiri" href="#"
                                                    class="btn btn-sm btn-outline-warning">Share</a>
                                            </div>
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- END-->
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
@endsection
