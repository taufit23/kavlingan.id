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
                        <form action="{{ route('penjual.data_tanah.jual_store') }}" class="p-5 bg-white" method="POST">
                            @csrf
                            <h2 class="h4 text-black mb-5">Masukan Data Tanah Dijual</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="role">Jenis Surat</label>
                                    <select name="role" class="form-control @error('role') is-invalid @enderror"
                                        id="bantuan_input">
                                        <option value="{{ auth()->user()->role_id }}" selected disabled>
                                            @if (auth()->user()->role_id == 3) Pembeli
                                            @elseif (auth()->user()->role_id == 4) Penjual @endif
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
                            <h4>Alamat</h4>
                            <p>Alamat yang didukung saat ini hanya di Kabupaten Kampar, Provinsi Riau</p>


                            <div class="row form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-md text-black-50">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
