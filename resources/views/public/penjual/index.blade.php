@extends('public.penjual.layouts.master')
@section('title')
    Dashboard Penjual
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-auto mx-auto">
                <div class="row my-2">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah data tanah : </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_data_tanah }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah data tanah belum validasi : </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $jumlah_data_tanah_belum_validasi }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah data tanah validasi ditolak : </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $jumlah_data_tanah_validasi_ditolak }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Jumlah data tanah telah valid : </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $jumlah_data_tanah_telah_valid }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->status != 1)
                            <strong class="text-danger"> Akun anda belum di validasi, informasi validasi akan dikirim
                                melalui email anda</strong>
                        @endif

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
