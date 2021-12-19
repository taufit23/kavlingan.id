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
                            <div class="p-4">
                                <div id="gambartanah{{ $tanah->id }}" class="carousel slide carousel-fade"
                                    data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($tanah->Gambarbidangtanah as $key => $gambartanah)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($gambartanah->gambar_bidang_tanah) }}"
                                                    class="d-block w-100" alt="...">
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
                                <h5> <a href="#" class="text-dark">{{ $tanah->deskripsi_tanah }}</a></h5>
                                <p>Luas tanah :
                                    <span class="float-right text-info">
                                        {{ $tanah->Surat_tanah->panjang_tanah . ' x ' . $tanah->Surat_tanah->lebar_tanah }}
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
                    @endforeach
                </div>
            </div>
            {{ $data_tanah->links('pagination::bootstrap-4') }}
    </div>

    </section>
    </div>
@endsection
