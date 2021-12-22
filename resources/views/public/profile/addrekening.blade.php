@extends('public.profile.layouts.master')
@section('title')
    Rekening
@endsection
@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Tambahkan informasi rekening</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                @include('vendor.flash_message')
                                <form action="{{ route('profil.addrekening.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="nama_bank" name="nama_bank" class="form-control"
                                                    placeholder="Nama bank">
                                                @error('nama_bank')
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
                                                <input type="text" id="nama_rekening" name="nama_rekening"
                                                    class="form-control" placeholder="Nama di rekening">
                                                @error('nama_rekening')
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
                                                <input type="text" id="nomor_rekening" name="nomor_rekening"
                                                    class="form-control" placeholder="Nomor rekening">
                                                @error('nomor_rekening')
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
