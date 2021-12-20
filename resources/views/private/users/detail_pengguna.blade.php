@extends('private.layouts.master')
@section('title')
    Validasi Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        @include('vendor.flash_message')
        @foreach ($user as $pengguna)
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Foto diri</div>
                        <div class="card-body text-center">
                            <a href="{{ asset($pengguna->avatar) }}" target="blank">
                                <img class="img-account-profile img-fluid img-thumbnail mb-2"
                                    src="{{ $pengguna->avatar }}">
                            </a>
                        </div>
                    </div>
                    <div class="card mb-4 mb-xl-0 mt-2">
                        <div class="card-header">Foto KTP</div>
                        <div class="card-body text-center">
                            <a href="{{ $pengguna->ktp_user->foto_ktp }}" target="blank">
                                <img class="img-account-profile img-fluid img-thumbnail mb-2"
                                    src="{{ $pengguna->ktp_user->foto_ktp }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Jenis pengguna : @if ($pengguna->role == 1)
                                Penjual & Pembeli
                            @else
                                Admin
                            @endif
                        </div>
                        {{-- <div class="card-body"> --}}
                        <table class="table table-light table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-light">Nama Lengkap : </th>
                                    <td class="bg-gradient-light text-primary">{{ $pengguna->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-light">Tempat/ Tanggal lahir :</th>
                                    <td class="bg-gradient-light text-primary">
                                        {{ $pengguna->ktp_user->tempat_lahir . '/ ' . $pengguna->ktp_user->tanggal_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Jenis kelamin :</th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($pengguna->ktp_user->jenis_kelamin == 'Lk')
                                            Laki-Laki
                                        @elseif ($pengguna->ktp_user->jenis_kelamin == 'Pr')
                                            Perempuan
                                        @else
                                            Tidak valid
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Nomor KTP: </th>
                                    <td class="bg-gradient-light text-primary">{{ $pengguna->ktp_user->no_ktp }}
                                    </td>
                                </tr>
                                @if ($pengguna->id_pekerjaan_user != null)
                                    <tr>
                                        <th class="text-light">Pekerjaan: </th>
                                        <td class="bg-gradient-light text-primary">
                                            {{ $pengguna->pekerjaan_user->nama_pekerjaan }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-light">Alamat kerja: </th>
                                        <td class="bg-gradient-light text-primary">
                                            <strong>Jalan : </strong>
                                            <span>{{ $pengguna->pekerjaan_user->jalan }}</span><br>
                                            <strong>Desa/Kelurahan : </strong>
                                            <span>{{ $pengguna->pekerjaan_user->desa_kelurahan }}</span><br>
                                            <strong>Kecamatan : </strong>
                                            <span>{{ $pengguna->pekerjaan_user->keecamatan }}</span><br>
                                            <strong>Kabupaten/Kota : </strong>
                                            <span>{{ $pengguna->pekerjaan_user->kota_kabupaten }}</span><br>
                                            <strong>Provinsi : </strong>
                                            <span>{{ $pengguna->pekerjaan_user->provinsi }}</span><br>
                                        </td>
                                    </tr>
                                @else
                                    <th class="text-light">Pekerjaan</th>
                                    <td class="bg-gradient-light text-primary">
                                        <strong>Informasi pekerjaan belum diisi</strong>
                                    </td>
                                @endif
                                <tr>
                                    <th class="text-light">Alamat email : </th>
                                    <td class="bg-gradient-light text-primary">{{ $pengguna->email }}</td>
                                </tr>
                                <tr>
                                    <th class="text-light">Nomor ponsel : </th>
                                    <td class="bg-gradient-light text-primary">{{ $pengguna->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th class="text-light">Alamat lengap : </th>
                                    @if ($pengguna->id_alamat_user != null)
                                        <td class="bg-gradient-light text-primary">
                                            <strong>Jalan : </strong>
                                            <span>{{ $pengguna->alamat_user->jalan }}</span><br>
                                            <strong>RT : </strong>
                                            <span>{{ $pengguna->alamat_user->no_rt }}</span><br>
                                            <strong>RW : </strong>
                                            <span>{{ $pengguna->alamat_user->no_rw }}</span><br>
                                            <strong>Desa/Kelurahan : </strong>
                                            <span>{{ $pengguna->alamat_user->desa_kelurahan }}</span><br>
                                            <strong>Kecamatan : </strong>
                                            <span>{{ $pengguna->alamat_user->keecamatan }}</span><br>
                                            <strong>Kabupaten/Kota : </strong>
                                            <span>{{ $pengguna->alamat_user->kota_kabupaten }}</span><br>
                                            <strong>Provinsi : </strong>
                                            <span>{{ $pengguna->alamat_user->provinsi }}</span><br>
                                        </td>
                                    @else
                                        <td class="bg-gradient-light text-primary">
                                            <strong>Alamat belum diisi</strong>
                                        </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th class="text-light">Status pengguna : </th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($pengguna->status == null)
                                            <div class="row justify-content-end">
                                                <div class="col">Belum divalidasi</div>
                                                <div class="col">
                                                    <form
                                                        action="/private_users/validasi_pengguna/aktifkan_pengguna/{{ $pengguna->id }}"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm font-weight-bold text-secondary btn-light btn-outline-success">Aktifkan</button>
                                                    </form>
                                                    <form
                                                        action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $pengguna->id }}"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">Tolak
                                                            aktivasi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @elseif ($pengguna->status == 0)
                                            <div class="row justify-content-end">
                                                <div class="col">Validasi ditolak</div>
                                            </div>
                                        @elseif ($pengguna->status == 1)
                                            <div class="row justify-content-end">
                                                <div class="col">Sudah valid</div>
                                                <div class="col">
                                                    <form
                                                        action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $pengguna->id }}"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger">Tolak
                                                            aktivasi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            </thead>

                        </table>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop
