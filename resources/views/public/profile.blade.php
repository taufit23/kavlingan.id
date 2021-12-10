@extends('public.penjual.layouts.master')
@section('title')
    Profil
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-auto mx-auto">
                <div class="row my-2">
                    <div class="col-lg-12 order-lg-2">
                        @include('vendor.flash_message')
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="" data-target="#profil" data-toggle="tab" class="nav-link active">profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#Informasi_personal" data-toggle="tab"
                                    class="nav-link">Informasi personal</a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#Informasi_alamat" data-toggle="tab" class="nav-link">
                                    @if (auth()->user()->id_alamat_user == null)
                                        Informasi alamat <strong class="text-danger">*</strong>
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <div class="row">
                                    <div class="col-md-12">
                                        <li class="list-unstyled">Alamat email : <span
                                                class="float-sm-right">{{ auth()->user()->email }}</span>
                                        </li>
                                        <li class="list-unstyled">Nomor ponsel : <span class="float-sm-right">
                                                {{ auth()->user()->no_hp }}
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Status profil : <span
                                                class="float-sm-right @if (auth()->user()->id_alamat_user === null) text-danger @endif">
                                                @if (auth()->user()->id_alamat_user === null)
                                                    Informasi alamat belum lengkap!
                                                @elseif (auth()->user()->id_pekerjaan_user === null)
                                                    Informasi pekerjaan belum lengkap!
                                                @endif
                                            </span>
                                        </li>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="mt-3 btn btn-sm btn-outline-danger btn-rounded mx-2 float-sm-right"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="Informasi_personal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <li class="list-unstyled">Nama lengkap : <span
                                                class="float-sm-right">{{ auth()->user()->ktp_user->nama_lengkap }}</span>
                                        </li>
                                        <li class="list-unstyled">Tempat/ Tanggal lahir : <span
                                                class="float-sm-right">{{ auth()->user()->ktp_user->tempat_lahir . ', ' . auth()->user()->ktp_user->tanggal_lahir }}</span>
                                        </li>
                                        <li class="list-unstyled">Jenis kelamin :
                                            <span class="float-sm-right">
                                                @if (auth()->user()->ktp_user->jenis_kelamin == 'Lk')
                                                    Laki-Laki
                                                @elseif (auth()->user()->ktp_user->jenis_kelamin == 'Pr')
                                                    Perempuan
                                                @else
                                                    Tidak valid
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Nomor KTP: <span
                                                class="float-sm-right">{{ auth()->user()->ktp_user->no_ktp }}</span>
                                        </li>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="mt-3 btn btn-sm btn-outline-danger btn-rounded mx-2 float-sm-right"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                                <!--/row-->
                            </div>
                            <div class="tab-pane" id="Informasi_alamat">
                                <div class="row">
                                    <div class="col-md-12">
                                        <li class="list-unstyled">Provinsi : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->provinsi }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Kabupaten / Kota : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->kota_kabupaten }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Kecamatan : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->kecamatan }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Desa / Kelurahan : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->desa_kelurahan }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">No RT/RW : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->no_rt . ', ' . auth()->user()->id_alamat_user->no_rw }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Nama jalan : <span class="float-sm-right">
                                                @if (auth()->user()->id_alamat_user == null)
                                                    Tidak boleh kosong <strong class="text-danger">*</strong>
                                                @else
                                                    {{ auth()->user()->id_alamat_user->jalan }}
                                                @endif
                                            </span>
                                        </li>
                                    </div>
                                    <div class="col-md-12">
                                        <a class="mt-3 btn btn-sm btn-outline-danger btn-rounded mx-2 float-sm-right"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                        <a href="{{ route('profil.addalamat') }}"
                                            class="mt-3 btn btn-sm btn-outline-primary btn-rounded mx-auto float-sm-right">
                                            Tambahkan alamat
                                        </a>
                                    </div>
                                </div>

                                <!--/row-->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center">
                        <img src="{{ auth()->user()->getAvatar() }}" class="mx-auto img-fluid img-circle d-block my-2"
                            alt=".">
                        <h6 class="mt-2">
                            Foto diri
                        </h6>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center">
                        <img src="{{ auth()->user()->ktp_user->foto_ktp }}"
                            class="mx-auto img-fluid img-circle d-block my-2" alt="." style="height: 150px; weight: 100px;">
                        <h6 class="mt-2">
                            foto KTP
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
