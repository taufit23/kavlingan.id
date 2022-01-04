@extends('public.profile.layouts.master')
@section('title')
    Profile
@endsection
@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Profile
                            @if (auth()->user()->id_alamat_user == null)
                                <strong class="text-danger">* Lengkapi alamat anda!!!</strong>
                            @elseif (auth()->user()->id_pekerjaan_user == null)
                                <strong class="text-danger">* Lengkapi informasi pekerjaan anda!!!</strong>
                            @else
                                @if (auth()->user()->status == null)
                                    <strong class="text-warning">* Mohon tunggu validasi dari admin</strong>
                                    @if (auth()->user()->id_rekening == null)
                                        <small class="text-warning"> Jika ingin menjual tanah, maka informasi rekening
                                            harus diisi</small>
                                    @endif
                                @else
                                    <strong class="text-success"> lengkap dan status valid</strong>
                                    @if (auth()->user()->id_rekening == null)
                                        <small class="text-warning"> Jika ingin menjual tanah, maka informasi rekening
                                            harus diisi</small>
                                    @endif
                                @endif
                            @endif
                        </h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="card mcard_3">
                            <div class="body">
                                <a href="{{ route('profil') }}">
                                    <img src="{{ auth()->user()->avatar }}" class="rounded-circle shadow "
                                        alt="profile-image">
                                </a>
                                <h4 class="m-t-10">{{ auth()->user()->ktp_user->nama_lengkap }}</h4>
                                @if (auth()->user()->id_alamat_user == null)
                                @else
                                    <a href="{{ route('home.index') }}" class="btn btn-sm btn-outline-success">Kembali ke
                                        home</a>
                                    <a href="{{ route('penjual.index') }}" class="btn btn-sm btn-outline-success">Kembali
                                        ke
                                        dashboard penjual</a>
                                @endif
                                <a class="btn btn-sm btn-outline-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <h6>
                            Note :
                        </h6>
                        <h2>
                            <strong class="text-danger">*</strong> Optional <br>
                            <strong class="text-danger">*</strong> <strong class="text-danger">*</strong> Wajib ada

                        </h2>
                    </div>

                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <strong>Informasi personal </strong>
                            <div class="body">
                                <small class="text-muted">Nama Lengkap: </small>
                                <p>{{ auth()->user()->ktp_user->nama_lengkap }}</p>
                                <small class="text-muted">Tempat/Tanggal lahir: </small>
                                <p>{{ auth()->user()->ktp_user->tempat_lahir . '/ ' . auth()->user()->ktp_user->tanggal_lahir }}
                                </p>
                                <small class="text-muted">Jenis kelamin: </small>
                                <p>
                                    @if (auth()->user()->ktp_user->jenis_kelamin == 'Lk')
                                        Laki - laki
                                    @else
                                        Perempuan
                                    @endif
                                </p>
                                <small class="text-muted">Foto KTP: </small>
                                <img src="{{ auth()->user()->ktp_user->foto_ktp }}" class="shadow "
                                    alt="profile-image" width="200"><br>
                                <small class="text-muted">Nomor KTP: </small>
                                <p>{{ auth()->user()->ktp_user->no_ktp }}
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi akun </strong>
                            <div class="body">
                                <small class="text-muted">Alamat email: </small>
                                <p>{{ auth()->user()->email }}</p>
                                <small class="text-muted">Nomor handphone: </small>
                                <p>{{ auth()->user()->no_hp }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi alamat </strong>
                            <div class="body">
                                <li class="list-unstyled">Provinsi : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->provinsi }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Kabupaten / Kota : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->kota_kabupaten }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Kecamatan : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->kecamatan }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Desa / Kelurahan : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->desa_kelurahan }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">No RT/RW : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->no_rt . ' / ' . auth()->user()->alamat_user->no_rw }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Nama jalan : <span class="float-sm-right">
                                        @if (auth()->user()->id_alamat_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->alamat_user->jalan }}
                                        @endif
                                    </span>
                                </li>
                                @if (auth()->user()->id_alamat_user == null)
                                    <div class="col-12 text-right">
                                        <a href="{{ route('profil.addalamat') }}" class="btn btn-sm btn-outline-warning">
                                            Tambahkan alamat
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi pekerjaan </strong>
                            <div class="body">
                                <li class="list-unstyled">Pekerjaan : <span class="float-sm-right">
                                        @if (auth()->user()->id_pekerjaan_user == null)
                                            Mohon dilengkapi <strong class="text-danger">*</strong> <strong
                                                class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->pekerjaan_user->nama_pekerjaan }}
                                        @endif
                                    </span>
                                </li>
                                <div class="col-12 text-right">
                                    @if (auth()->user()->id_pekerjaan_user == null)
                                        <a href="{{ route('profil.addpekerjaan') }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Tambahkan pekerjaan
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi Rekening </strong>
                            <div class="body">
                                <li class="list-unstyled">Nama bank : <span class="float-sm-right">
                                        @if (auth()->user()->id_rekening == null)
                                            Lengkapi <strong class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->rekening->nama_bank }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Nama di rekening : <span class="float-sm-right">
                                        @if (auth()->user()->id_rekening == null)
                                            Lengkapi <strong class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->rekening->nama_rekening }}
                                        @endif
                                    </span>
                                </li>
                                <li class="list-unstyled">Nomor rekening : <span class="float-sm-right">
                                        @if (auth()->user()->id_rekening == null)
                                            Lengkapi <strong class="text-danger">*</strong>
                                        @else
                                            {{ auth()->user()->rekening->nomor_rekening }}
                                        @endif
                                    </span>
                                </li>
                                <div class="col-12 text-right">
                                    @if (auth()->user()->id_rekening == null)
                                        <a href="{{ route('profil.addrekening') }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Tambahkan rekening
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
