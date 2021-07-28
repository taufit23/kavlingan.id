@extends('public.penjual.layouts.master')
@section('title')
    Edit profil
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-12 px-md-5 py-5">
                        <form action="{{ route('profil.update', auth()->user()->id) }}" class="p-5 bg-white"
                            method="POST">
                            @method('PUT')
                            @csrf
                            <h2 class="h4 text-black mb-5">Edit profile</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="role">Sebagai</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        id="bantuan_input">
                                        <option value="{{ auth()->user()->role }}" selected disabled>
                                            @if (auth()->user()->role === 'Pembeli')
                                                Pembeli
                                            @elseif (auth()->user()->role === 'Penjual') Penjual @endif
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="username">Nama pengguna</label>
                                    <input type="text" id="username" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        value="{{ auth()->user()->username }}" readonly>
                                    @error('username')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="name">Nama lengkap</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') ? old('name') : auth()->user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="email">Alamat email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('email') ? old('email') : auth()->user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="text-black" for="no_hp">No hp</label>
                                    <input type="text" id="no_hp" name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror @if (auth()->user()->no_hp == null) is-valid @endif"
                                    value="{{ old('no_hp') ? old('no_hp') : auth()->user()->no_hp }}"
                                    placeholder="@if (auth()->user()->no_hp == null) Mohon
                                        Masukan nomor hp anda @endif">
                                        @error('no_hp')
                                            <span class="invalid-feedback">
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            </span>
                                        @enderror
                                </div>

                            </div>
                            <h4>Alamat : {{ auth()->user()->alamat }}</h4>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="provinces">Provinsi</label>
                                    <select name="provinces" id="provinces" class="form-control @if (auth()->user()->alamat == null) is-valid @endif"
                                        aria-label="province">
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
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="cities">Kabupaten / Kota</label>
                                    <select name="cities" id="cities" class="form-control @if (auth()->user()->alamat == null) is-valid @endif"
                                        aria-label="cities">
                                        <option value="">Kabupaten / Kota</option>
                                    </select>
                                    @error('cities')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="districts">Kecamatan</label>
                                    <select name="districts" id="districts" class="form-control @if (auth()->user()->alamat == null) is-valid @endif"
                                        aria-label="districts">
                                        <option value="">Kecamatan</option>
                                    </select>
                                    @error('districts')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="villages">Desa</label>
                                    <select name="villages" id="villages" class="form-control @if (auth()->user()->alamat == null) is-valid @endif"
                                        aria-label="villages">
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

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="nama_jln">Nama jalan</label>
                                    <input type="text" id="nama_jln" name="nama_jln" class="form-control @if (auth()->user()->alamat == null) is-valid @endif"
                                    placeholder="Contoh : Jl. Jend Ahmad Yani">
                                    <span>Masukan nama jalan yang jelas</span>
                                    @error('nama_jln')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="bio">Biografi diri</label>
                                    <textarea class="form-control @if (auth()->user()->alamat == null) is-valid @endif" name="bio" id="bio" placeholder="biografi diri anda">{{ old('bio') ? old('bio') : auth()->user()->bio }}</textarea>

                                    @error('bio')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-md text-black-50">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
    </div>
@endsection
@push('scripts')
    @include('public.penjual.layouts._includes._script')
@endpush
