@extends('private.layouts.master')
@section('title')
    Validasi Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data pengguna belum aktif</h6>
            </div>
            <div class="card-body">
                @include('vendor.flash_message')
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No KTP</th>
                                <th>Jenis Pengguna</th>
                                <th>Email</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan</th>
                                <th>Alamat Kerja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>No KTP</th>
                                <th>Jenis Pengguna</th>
                                <th>Email</th>
                                <th>Nama Ibu</th>
                                <th>Pekerjaan</th>
                                <th>Alamat Kerja</th>
                                <th>aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data_user as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td><a
                                            href="{{ route('private.users.detail_pengguna', [$user->id]) }}">{{ $user->no_ktp }}</a>
                                    </td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->nama_ibu }}</td>
                                    <td>{{ $user->pekerjaan }}</td>
                                    <td>{{ $user->alamat_kerja }}</td>
                                    <td>
                                        <form
                                            action="/private_users/validasi_pengguna/aktifkan_pengguna/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm my-1 btn-outline-success">Aktif</button>
                                        </form>
                                        <form action="/private_users/validasi_pengguna/tolak_aktivasi/{{ $user->id }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm my-1 btn-outline-danger">Tolak
                                                aktivasi</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
