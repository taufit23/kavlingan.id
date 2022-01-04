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
