@extends('public.layouts.master')
@section('title')
    Daftar
@endsection
@section('content')
    <div class="site-section" id="login-section">
        <div class="container">
            <div class="row align-items-lg-center justify-content-center">
                <div class="col-md-8 mb-5 mb-lg-0 position-relative mt-4">
                    <div class="card">
                        <div class="card-header text-center">{{ __('Pendaftaran Kavlingan.id') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nama lengkap') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tempat_lahir"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Tempat / Taggal Lahir') }}</label>

                                    <div class="col-md-3">
                                        <input id="tempat_lahir" type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                            autocomplete="tempat_lahir" placeholder="Tempat lahir">

                                        @error('tempat_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <input id="tanggal_lahir" type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                            autocomplete="tanggal_lahir" placeholder="tanggal lahir">

                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="agama"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Agama') }}</label>
                                    <div class="col-md-6">
                                        <select name="role" class="form-control">
                                            <option>== Select Agama ==</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen rotestan">Kristen</option>
                                            <option value="Kristen katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
                                        </select>
                                        @error('agama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_kelamin"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Jenis kelamin') }}</label>

                                    <div class="col-md-6">
                                        <select name="role" class="form-control">
                                            <option>== Select province ==</option>
                                            <option value="lk">Laki-laki</option>
                                            <option value="pr">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_ktp"
                                        class="col-md-4 col-form-label text-md-right">{{ __('No KTP') }}</label>

                                    <div class="col-md-6">
                                        <input id="no_ktp" type="text"
                                            class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp"
                                            value="{{ old('no_ktp') }}" required autocomplete="no_ktp">

                                        @error('no_ktp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="provinces"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                    <div class="col-md-6">
                                        <label class="text-black" for="provinces">Provinsi</label>
                                        <select name="provinces" id="provinces" class="form-control" aria-label="province">
                                            <option value="">Provinsi</option>
                                            @foreach ($provinces as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinces')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                        <label class="text-black" for="cities">Kabupaten / Kota</label>
                                        <select name="cities" id="cities" class="form-control" aria-label="cities">
                                            <option value="">Kabupaten / Kota</option>
                                        </select>
                                        @error('cities')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                        <label class="text-black" for="districts">Kecamatan</label>
                                        <select name="districts" id="districts" class="form-control" aria-label="districts">
                                            <option value="">Kecamatan</option>
                                        </select>
                                        @error('districts')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                        <label class="text-black" for="villages">Desa</label>
                                        <select name="villages" id="villages" class="form-control" aria-label="villages">
                                            <option value="">Desa</option>
                                        </select>
                                        @error('villages')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_ibu"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Nama ibu') }}</label>

                                    <div class="col-md-6">
                                        <input id="nama_ibu" type="nama_ibu"
                                            class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                                            value="{{ old('nama_ibu') }}" required autocomplete="nama_ibu">

                                        @error('nama_ibu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pekerjaan"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Pekerjaan') }}</label>

                                    <div class="col-md-6">
                                        <input id="pekerjaan" type="pekerjaan"
                                            class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                            value="{{ old('pekerjaan') }}" required autocomplete="pekerjaan">

                                        @error('pekerjaan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat tempat kerja"
                                        class="col-md-4 col-form-label text-md-right">{{ __('alamat tempat kerja') }}</label>

                                    <div class="col-md-6">
                                        <input id="alamat tempat kerja" type="alamat tempat kerja"
                                            class="form-control @error('alamat tempat kerja') is-invalid @enderror"
                                            name="alamat tempat kerja" value="{{ old('alamat tempat kerja') }}" required
                                            autocomplete="alamat tempat kerja">

                                        @error('alamat tempat kerja')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Alamat email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kata sandi') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi kata sandi') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Daftar sebagai') }}</label>

                                    <div class="col-md-6">
                                        <select name="role" class="form-control" id="bantuan_input">
                                            <option>== Select Role ==</option>
                                            @foreach ($role as $r => $name)
                                                <option value="{{ $name }}" title="{{ $r }}">
                                                    {{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="foto_ktp"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Foto KTP') }}</label>

                                    <div class="col-md-6">
                                        <input class="form-control form-control-file" type="file" name="foto_ktp"
                                            id="foto_ktp">
                                        @error('foto_ktp')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0 text-right">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('public.penjual.layouts._includes._script')
@endpush
