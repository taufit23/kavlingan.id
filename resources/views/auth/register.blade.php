@extends('public.layouts.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/opensans-font.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('auth/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}" />
@endpush
@section('title')
    Daftar
@endsection
@section('content')
    <div class="site-section" id="login-section">
        <div class="container">
            <div class="row align-items-lg-center justify-content-center">
                <div class="form-v1-content">
                    <div class="wizard-form">
                        <form class="form-register" method="POST" action="{{ route('register') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="form-total">
                                @if (session('errors'))
                                    <div class="alert alert-warning"
                                        style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                        role="alert">
                                        {{ session('errors') }}
                                    </div>
                                @endif
                                <!-- SECTION 1 -->
                                <h2>
                                    <span class="step-text">Informasi personal <strong class="text-danger">
                                            *</strong></span>
                                </h2>
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Informasi personal<strong class="text-danger">
                                                    *</strong></h3>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>{{ __('Nama lengkap') }}</legend>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name') }}" required autocomplete="name"
                                                        placeholder="{{ __('Contoh : Taufit hidayat') }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder">
                                                <fieldset>
                                                    <legend>Tempat lahir</legend>
                                                    <input id="tempat_lahir" type="text"
                                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                                        autocomplete="tempat_lahir" placeholder="desa tempat lahir">
                                                    @error('tempat_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="form-holder">
                                                <fieldset>
                                                    <legend>Tanggal lahir</legend>
                                                    <input id="tanggal_lahir" type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                                        autocomplete="tanggal_lahir" max="{{ $max_date_lahir }}">

                                                    @error('tanggal_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>{{ __('Jenis kelamin') }}</legend>
                                                    <select name="jenis_kelamin"
                                                        style="font-size: unset !important; color: unset !important; font-weight: unset !important; background:unset !important; background-position: unset !important; z-index: unset !important; cursor: unset !important; position: unset !important; border: unset !important; padding: unset !important;">
                                                        <option value="lk"
                                                            {{ old('jenis_kelamin') == 'lk' ? 'selected' : '' }}>
                                                            Laki-laki</option>
                                                        <option value="pr"
                                                            {{ old('jenis_kelamin') == 'pr' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>{{ __('Nomor ktp') }}</legend>
                                                    <input id="no_ktp" type="text"
                                                        class="form-control @error('no_ktp') is-invalid @enderror"
                                                        name="no_ktp" value="{{ old('no_ktp') }}" required
                                                        autocomplete="off" maxlength="16"
                                                        placeholder="Contoh : 3576447103910003">

                                                    @error('no_ktp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>{{ __('Foto ktp') }}</legend>
                                                    <input class="form-control form-control-file" type="file"
                                                        name="foto_ktp" id="foto_ktp">
                                                    @error('foto_ktp')
                                                        <span class="invalid-feedback">
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <h2>
                                    <span class="step-text">Informasi akun <strong class="text-danger">
                                            *</strong></span>
                                </h2>
                                <!-- SECTION 2 -->
                                <section>
                                    <div class="inner">
                                        <div class="wizard-header">
                                            <h3 class="heading">Informasi akun <strong class="text-danger">
                                                    *</strong></h3>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-holder form-holder-2">
                                                <fieldset>
                                                    <legend>{{ __('Alamat email') }}</legend>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" placeholder="Contoh : Taufit@gmail.com">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset>
                                                    <legend>{{ __('Nomor Handphone') }}</legend>
                                                    <input id="no_hp" type="text"
                                                        class="form-control @error('no_hp') is-invalid @enderror"
                                                        name="no_hp" value="{{ old('no_hp') }}" required
                                                        autocomplete="no_hp" maxlength="12"
                                                        placeholder="Contoh : 082251323323">
                                                    @error('no_hp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset>
                                                    <legend>{{ __('Foto diri') }}</legend>
                                                    <input class="form-control form-control-file" type="file" name="avatar"
                                                        id="avatar">
                                                    @error('avatar')
                                                        <span class="invalid-feedback">
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset>
                                                    <legend>{{ __('Kata sandi') }}</legend>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="Password (Min : 8 karakter)">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                                <fieldset>
                                                    <legend>{{ __('Konfirmasi kata sandi') }}</legend>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password"
                                                        placeholder="Harus sama dengan kata sandi">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <button type="submit" class="float-right btn btn-success btn-sm">Daftar</button>
                                    </div>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('public.penjual.layouts._includes._script')
    <script src="{{ asset('auth/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('auth/js/jquery.steps.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
@endpush
