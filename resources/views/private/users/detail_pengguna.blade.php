@extends('private.layouts.master')
@section('title')
    Validasi Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        @include('vendor.flash_message')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Foto diri</div>
                    <div class="card-body text-center">
                        <a href="{{ $user->avatar }}" target="blank">
                            <img class="img-account-profile img-fluid img-thumbnail mb-2" src="{{ $user->avatar }}">
                        </a>
                    </div>
                </div>
                <div class="card mb-4 mb-xl-0 mt-2">
                    <div class="card-header">Foto KTP</div>
                    <div class="card-body text-center">
                        <a href="{{ $user->foto_ktp }}" target="blank">
                            <img class="img-account-profile img-fluid img-thumbnail mb-2" src="{{ $user->foto_ktp }}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Jenis pengguna : {{ $user->role }}</div>
                    {{-- <div class="card-body"> --}}
                    <table class="table table-light table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-light">Nama Lengkap : </th>
                                <td class="bg-gradient-light text-primary">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Tempat/ Tanggal lahir :</th>
                                <td class="bg-gradient-light text-primary">{{ $user->tempat_tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Agama : </th>
                                <td class="bg-gradient-light text-primary">
                                    @if ($user->agama == 1)
                                        Islam
                                    @elseif ($user->agama == 2)
                                        Protestan
                                    @elseif ($user->agama == 3)
                                        Katolik
                                    @elseif ($user->agama == 4)
                                        Hindu
                                    @elseif ($user->agama == 5)
                                        Budha
                                    @elseif ($user->agama == 6)
                                        Khonghucu
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Jenis kelamin :</th>
                                <td class="bg-gradient-light text-primary">
                                    @if ($user->jenis_kelamin == 'lk')
                                        Laki-Laki
                                    @elseif ($user->jenis_kelamin == 'pr')
                                        Perempuan
                                    @else
                                        Tidak valid
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Nomor KTP: </th>
                                <td class="bg-gradient-light text-primary">{{ $user->no_ktp }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Pekerjaan: </th>
                                <td class="bg-gradient-light text-primary">{{ $user->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Alamat kerja: </th>
                                <td class="bg-gradient-light text-primary">{{ $user->alamat_kerja }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Nama ibu: </th>
                                <td class="bg-gradient-light text-primary">{{ $user->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Alamat email : </th>
                                <td class="bg-gradient-light text-primary">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Nomor ponsel : </th>
                                <td class="bg-gradient-light text-primary">{{ $user->no_hp }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Alamat lengap : </th>
                                <td class="bg-gradient-light text-primary">{{ $user->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Biografi diri : </th>
                                <td class="bg-gradient-light text-primary">{{ $user->bio }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Status pengguna : </th>
                                <td class="bg-gradient-light text-primary">
                                    @if ($user->status == null)
                                        <div class="row justify-content-end">
                                            <div class="col">Belum divalidasi</div>
                                            <div class="col">
                                                <form
                                                    action="/private_users/validasi_pengguna/aktifkan_pengguna/{{ $user->id }}"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-success">Aktifkan</button>
                                                </form>
                                                <form
                                                    action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $user->id }}"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Tolak
                                                        aktivasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif ($user->status == 0)
                                        <div class="row justify-content-end">
                                            <div class="col">Validasi ditolak</div>
                                            <div class="col">
                                                <form
                                                    action="/private_users/validasi_pengguna/aktifkan_pengguna/{{ $user->id }}"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-success">Aktifkan</button>
                                                </form>
                                                <form
                                                    action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $user->id }}"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Tolak
                                                        aktivasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    @elseif ($user->status == 1)
                                        <div class="row justify-content-end">
                                            <div class="col">Sudah valid</div>
                                            <div class="col">
                                                <form
                                                    action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $user->id }}"
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
    </div>
@stop
