@extends('public.profile.layouts.master')
@section('title')
    Alamat
@endsection
@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tambahkan alamat</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                @include('vendor.flash_message')
                                <form action="{{ route('profil.addalamat.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick" data-live-search="true"
                                                    name="provinsi">
                                                    <option>Provinsi</option>
                                                    @foreach ($provinces as $id => $name)
                                                        <option value="{{ $name }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick" data-live-search="true"
                                                    name="kota_kabupaten">
                                                    <option>Kota kabupaten</option>
                                                    @foreach ($cityes as $id => $name)
                                                        <option value="{{ $name }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick" data-live-search="true"
                                                    name="kecamatan">
                                                    <option>Kecamatan</option>
                                                    @foreach ($district as $id => $name)
                                                        <option value="{{ $name }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="desa_kelurahan" name="desa_kelurahan"
                                                    class="form-control" placeholder="Desa / kelurahan">
                                                @error('desa_kelurahan')
                                                    <span class="invalid-feedback">
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="no_rt" name="no_rt" class="form-control"
                                                    placeholder="Nomor RT">
                                                @error('no_rt')
                                                    <span class="invalid-feedback">
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="no_rw" name="no_rw" class="form-control"
                                                    placeholder="Nomor RT">
                                                @error('no_rw')
                                                    <span class="invalid-feedback">
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="jalan" name="jalan" class="form-control"
                                                    placeholder="Nama jalan">
                                                @error('jalan')
                                                    <span class="invalid-feedback">
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 text-right">
                                            <button type="submit" class="btn btn-info">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
