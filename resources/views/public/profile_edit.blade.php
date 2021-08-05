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
                            <h2 class="h4 text-black mb-2">Edit profile</h2>
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
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="text-black" for="tempat_tanggal_lahir">Tempat tanggal lahir</label>
                                    <input type="text" id="tempat_tanggal_lahir" name="tempat_tanggal_lahir"
                                        class="form-control @error('tempat_tanggal_lahir') is-invalid @enderror"
                                        id="bantuan_input" title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('tempat_tanggal_lahir') ? old('tempat_tanggal_lahir') : auth()->user()->tempat_tanggal_lahir }}">
                                    @error('tempat_tanggal_lahir')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control" aria-label="agama">
                                        <option value="" @if (auth()->user()->agama == null) selected @endif>Select religion</option>
                                        <option value="1" @if (auth()->user()->agama == 1) selected @endif>Islam</option>
                                        <option value="2" @if (auth()->user()->agama == 2) selected @endif>Protestan</option>
                                        <option value="3" @if (auth()->user()->agama == 3) selected @endif>Katolik</option>
                                        <option value="4" @if (auth()->user()->agama == 4) selected @endif>Hindu</option>
                                        <option value="5" @if (auth()->user()->agama == 5) selected @endif>Buddha</option>
                                        <option value="6" @if (auth()->user()->agama == 6) selected @endif>Khonghucu</option>
                                    </select>
                                    @error('agama')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="text-black" for="no_ktp">Nomor KTP</label>
                                    <input type="text" id="no_ktp" name="no_ktp"
                                        class="form-control @error('no_ktp') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('no_ktp') ? old('no_ktp') : auth()->user()->no_ktp }}">
                                    @error('no_ktp')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="nama_ibu">Nama ibu</label>
                                    <input type="text" id="nama_ibu" name="nama_ibu"
                                        class="form-control @error('nama_ibu') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('nama_ibu') ? old('nama_ibu') : auth()->user()->nama_ibu }}">
                                    @error('nama_ibu')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6">
                                    <label class="text-black" for="pekerjaan">Pekerjaan</label>
                                    <input type="text" id="pekerjaan" name="pekerjaan"
                                        class="form-control @error('pekerjaan') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('pekerjaan') ? old('pekerjaan') : auth()->user()->pekerjaan }}">
                                    @error('pekerjaan')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="alamat_kerja">Alamat kerja</label>
                                    <input type="text" id="alamat_kerja" name="alamat_kerja"
                                        class="form-control @error('alamat_kerja') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('alamat_kerja') ? old('alamat_kerja') : auth()->user()->alamat_kerja }}">
                                    @error('alamat_kerja')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">

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
                                <div class="col-md-6">
                                    <label class="text-black" for="no_hp">no_hp</label>
                                    <input type="text" id="no_hp" name="no_hp"
                                        class="form-control @error('no_hp') is-invalid @enderror" id="bantuan_input"
                                        title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;"
                                        value="{{ old('no_hp') ? old('no_hp') : auth()->user()->no_hp }}">
                                    @error('no_hp')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h4>Alamat : {{ auth()->user()->alamat }}
                                @if (auth()->user()->alamat != null)
                                    <small class="float-right text-danger ">Alamat hanya bisa di edit satu kali</small>
                                @endif
                            </h4>
                            @if (auth()->user()->alamat == null)
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
                            @endif
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
