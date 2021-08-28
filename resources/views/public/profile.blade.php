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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profil">
                                <div class="row">
                                    <div class="col-md-12">
                                        <li class="list-unstyled">Nama lengkap : <span
                                                class="float-sm-right">{{ auth()->user()->name }}</span>
                                        </li>
                                        <li class="list-unstyled">Tempat/ Tanggal lahir : <span
                                                class="float-sm-right">{{ auth()->user()->tempat_tanggal_lahir }}</span>
                                        </li>
                                        <li class="list-unstyled">Agama : <span class="float-sm-right">
                                                @if (auth()->user()->agama == 1)
                                                    Islam
                                                @elseif (auth()->user()->agama == 2)
                                                    Protestan
                                                @elseif (auth()->user()->agama == 3)
                                                    Katolik
                                                @elseif (auth()->user()->agama == 4)
                                                    Hindu
                                                @elseif (auth()->user()->agama == 5)
                                                    Budha
                                                @elseif (auth()->user()->agama == 6)
                                                    Khonghucu
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Jenis kelamin :
                                            <span class="float-sm-right">
                                                @if (auth()->user()->jenis_kelamin == 'lk')
                                                    Laki-Laki
                                                @elseif (auth()->user()->jenis_kelamin == 'pr')
                                                    Perempuan
                                                @else
                                                    Tidak valid
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Nomor KTP: <span
                                                class="float-sm-right">{{ auth()->user()->no_ktp }}</span>
                                        </li>
                                        <li class="list-unstyled">Pekerjaan: <span
                                                class="float-sm-right">{{ auth()->user()->pekerjaan }}</span>
                                        </li>
                                        <li class="list-unstyled">Alamat kerja: <span
                                                class="float-sm-right">{{ auth()->user()->alamat_kerja }}</span>
                                        </li>
                                        <li class="list-unstyled">Nama ibu: <span
                                                class="float-sm-right">{{ auth()->user()->nama_ibu }}</span>
                                        </li>
                                        <li class="list-unstyled">Alamat email : <span
                                                class="float-sm-right">{{ auth()->user()->email }}</span>
                                        </li>
                                        <li class="list-unstyled">Nomor ponsel : <span class="float-sm-right @if (auth()->user()->no_hp === null) text-danger @endif">
                                                @if (auth()->user()->no_hp === null)
                                                    Lengkapi profil anda!
                                                @else
                                                    {{ auth()->user()->no_hp }}
                                                @endif
                                            </span>
                                        </li>
                                        <li class="list-unstyled">Alamat lengap : <span class="float-sm-right @if (auth()->user()->alamat === null) text-danger @endif">
                                                @if (auth()->user()->alamat === null)
                                                    Lengkapi profil anda!
                                                @else
                                                    {{ auth()->user()->alamat }}
                                                @endif
                                            </span>
                                        </li>

                                        <li class="list-unstyled">Biografi diri : <span class="float-sm-right @if (auth()->user()->bio === null) text-danger @endif">
                                                @if (auth()->user()->alamat === null)
                                                    Lengkapi profil anda!
                                                @else
                                                    {{ auth()->user()->bio }}
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
                                        <a href="{{ route('profil.edit') }}"
                                            class="mt-3 btn btn-sm btn-outline-primary btn-rounded mx-auto float-sm-right">
                                            Edit profil
                                        </a>

                                    </div>
                                </div>

                                <!--/row-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center">
                        <form class="form-horizontal" role="form"
                            action="/{{ auth()->user()->id }}/profile/upload_avatar" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img src="{{ auth()->user()->getAvatar() }}"
                                class="mx-auto img-fluid img-circle d-block my-2" alt="{{ auth()->user()->name }}">
                            <h6 class="mt-2">
                                Foto diri
                            </h6>
                            <label class="custom-file">
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control @error('avatar') is-invalid @enderror">
                                <button type="submit" class="btn btn-sm btn-outline-success" hidden>Upload</button>
                                @error('avatar')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </label>
                            <button type="submit" class="mt-3 btn btn-sm btn-outline-dark btn-rounded mx-auto">
                                Update
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-6 order-lg-1 text-center">
                        <form class="form-horizontal" role="form" action="/{{ auth()->user()->id }}/profile/upload_ktp"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <img src="{{ auth()->user()->foto_ktp }}" class="mx-auto img-fluid img-circle d-block my-2"
                                alt="{{ auth()->user()->foto_ktp }}" style="height: 150px; weight: 100px;">
                            <h6 class="mt-2">
                                foto KTP
                            </h6>
                            <label class="custom-file">
                                <input type="file" name="foto_ktp" id="foto_ktp"
                                    class="form-control @error('foto_ktp') is-invalid @enderror">
                                <button type="submit" class="btn btn-sm btn-outline-success" hidden>Upload</button>
                                @error('foto_ktp')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                            </label>
                            <button type="submit" class="mt-3 btn btn-sm btn-outline-dark btn-rounded mx-auto">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
