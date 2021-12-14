@extends('public.profile.layouts.master')
@section('title')
    Pekerjaan
@endsection
@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tambahkan pekerjaan</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <form action="{{ route('profil.addpekerjaan.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="nama_pekerjaan" name="nama_pekerjaan"
                                                    class="form-control" placeholder="Nama pekerjaan">
                                                @error('nama_pekerjaan')
                                                    <span class="invalid-feedback">
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <strong>Alamat kerja</strong>
                                            <div class="form-group">
                                                <select class="form-control show-tick" data-live-search="true"
                                                    name="provinsi">
                                                    <option>Provinsi</option>
                                                    @foreach ($provinces as $id => $name)
                                                        <option value="{{ $id }}">
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
                                                        <option value="{{ $id }}">
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
                                                        <option value="{{ $id }}">
                                                            {{ $name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="desa" name="desa" class="form-control"
                                                    placeholder="Nama desa">
                                                @error('desa')
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
