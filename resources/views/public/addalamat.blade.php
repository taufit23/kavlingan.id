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
                            <h2 class="h4 text-black mb-2">Tambahkan alamat</h2>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
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
                                </div>
                                <div class="col-md-6">
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
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
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
                                </div>
                                <div class="col-md-6">
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

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="nama_jln">Nama jalan</label>
                                    <input type="text" id="nama_jln" name="nama_jln" class="form-control"
                                        placeholder="Contoh : Jl. Jend Ahmad Yani" value="{{ old('nama_jln') }}">
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
                                    <textarea class="form-control" name="bio" id="bio"
                                        placeholder="biografi diri anda">{{ old('bio') ? old('bio') : auth()->user()->bio }}</textarea>

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
