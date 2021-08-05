@extends('private.layouts.master')
@section('title')
    Validasi tanah
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data tanah belum valid</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Deskripsi tanah</th>
                                <th>Nama pengguna</th>
                                <th>Nama pemilik</th>
                                <th>Jenis surat</th>
                                <th>Nomor surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Deskripsi tanah</th>
                                <th>Nama pengguna</th>
                                <th>Nama pemilik</th>
                                <th>Jenis surat</th>
                                <th>Nomor surat</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data_tanah_belum_valid as $belum_valid)
                                <tr>
                                    <td>{{ $belum_valid->deskripsi_tanah }}</td>
                                    <td>
                                        @foreach ($user as $u)
                                            @if ($belum_valid->id_user == $u->id)
                                                {{ $u->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $belum_valid->nama_pemilik }}</td>
                                    <td>
                                        @foreach ($jenis_surat as $jenis)
                                            @if ($belum_valid->id_jenis_surat == $jenis->id)
                                                {{ $jenis->nama_jenis_surat }}
                                            @endif
                                        @endforeach
                                    <td>{{ $belum_valid->nomor_surat }}</td>
                                    <td><a href="{{ route('private.detail_tanah', [$belum_valid->id]) }}"
                                            class="btn btn-sm btn-outline-info">Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
