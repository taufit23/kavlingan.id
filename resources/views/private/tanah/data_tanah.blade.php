@extends('private.layouts.master')
@section('title')
    Data tanah
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data tanah</h6>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total data tanah</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jumlah_data_tanah }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total data tanah tervalidasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $jumlah_data_tanah_tervalidasi }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Total data tanah belum divalidasi</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $jumlah_data_tanah_belum_valid }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Total data tanah validasi ditolak</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $jumlah_data_tanah_validasi_ditolak }}</div>
                                    </div>
                                    <div class="col-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Status tanah</th>
                                <th>Deskripsi tanah</th>
                                <th>Nama pemilik</th>
                                <th>Nomor surat</th>
                                <th>Alamat tanah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Status tanah</th>
                                <th>Deskripsi tanah</th>
                                <th>Nama pemilik</th>
                                <th>Jenis surat</th>
                                <th>Alamat tanah</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data_tanah as $tanah)
                                <tr>
                                    @if ($tanah->status == null)
                                        <td class="text-warning">
                                            Belum di validasi
                                        </td>
                                    @elseif ($tanah->status == 0)
                                        <td class="text-danger">
                                            Valdiasi ditolak
                                        </td>
                                    @elseif ($tanah->status == 1)
                                        <td class="text-success">
                                            Sudah valid
                                        </td>
                                    @endif
                                    <td>{{ $tanah->deskripsi_tanah }}</td>
                                    <td>{{ $tanah->nama_pemilik }}</td>
                                    <td>{{ $tanah->nomor_surat }}</td>
                                    <td>{{ $tanah->alamat }}</td>
                                    <td>
                                        <a href="{{ route('private.detail_tanah', [$tanah->id]) }}"
                                            class="btn btn-sm btn-outline-info">Detail</a>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                    {{ $data_tanah->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@stop
