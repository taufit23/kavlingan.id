@extends('public.penjual.layouts.master')
@section('title')
    Data Tanah
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-auto mx-auto">
                <div class="row my-2">
                    <a href="{{ route('penjual.data_tanah.jual') }}" class="btn btn-sm btn-block btn-info my-2">Tambah
                        Tanah</a>
                    @include('vendor.flash_message')
                    <!-- Gallery item -->
                    @foreach ($data_tanah as $tanah)
                        <div class="col-sm-6">
                            <div class="bg-white rounded shadow-sm"><img src="{{ asset($tanah->gambar_bidang_tanah) }}"
                                    class="img-fluid card-img-top">
                                <div class="p-4">
                                    <h5> <a href="#" class="text-dark">{{ $tanah->deskripsi_tanah }}</a></h5>
                                    <p>Luas tanah :
                                        <span class="float-right text-info">
                                            {{ $tanah->panjang_tanah . ' x ' . $tanah->lebar_tanah }}
                                            M<sup>2</sup></span>
                                    </p>
                                    <p>Harga tanah :
                                        <span class="float-right text-info">
                                            Rp. {{ number_format($tanah->harga_tanah), 2 }} </span>
                                    </p>
                                    <p>Status :
                                        @if ($tanah->status == null)
                                            <span class="float-right text-warning">
                                                Belum divalidasi
                                            </span>
                                        @elseif ($tanah->status == 0)
                                            <span class="float-right text-danger">
                                                Validasi ditolak
                                            </span>
                                        @elseif ($tanah->status == 1)
                                            <span class="float-right text-success">
                                                Telah valid
                                            </span>
                                        @endif
                                    </p>
                                    <p class="text-right">
                                        <a href="{{ route('penjual.data_tanah.detail', $tanah->id) }}"
                                            class="btn btn-sm btn-outline-primary">Detail</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $data_tanah->links('pagination::bootstrap-4') }}
            </div>

        </section>
    </div>
@endsection
