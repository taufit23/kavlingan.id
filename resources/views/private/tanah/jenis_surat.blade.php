@extends('private.layouts.master')
@section('title')
    Jenis Surat
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <form class="navbar-form navbar-right" method="GET" action="/private_jenis_surat">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="cari" id="search" class="form-control"
                                            placeholder="Cari jenis surat">
                                        <span class="input-group-btn"><button type="submit" class="btn btn-primary mx-1"><i
                                                    class="fas fa-search"></i></button></span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 text-right">
                                <div id="dataTable_filter" class="dataTables_filter">
                                    <label>Tambah Jenis Surat :
                                        <button type="button" class="btn btn-sm btn-facebook form-control form-control-sm"
                                            data-toggle="modal" data-target="#modal_tambah_jenis_surat"><i
                                                class="fas fa-plus"></i></button>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped table-bordered dataTable" id="dataTable" role="grid"
                                    aria-describedby="dataTable_info">
                                    <thead>
                                        <tr role="roe">
                                            <th class="text-center" tabindex="0" aria-controls="dataTable"
                                                aria-rowspan="1" aria-colspan="1">Id Jenis
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" aria-rowspan="1" aria-colspan="1">
                                                Jenis Surat
                                            </th>
                                            {{-- <th class="text-center" tabindex="0" aria-controls="dataTable" aria-rowspan="1"
                                                aria-colspan="1">Id Jenis
                                            </th> --}}
                                            <th class="text-center" tabindex="0" aria-controls="dataTable"
                                                aria-rowspan="1" aria-colspan="1">Aksi
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        {{-- @php $no = 1; @endphp --}}
                                        @foreach ($tabel_jenis_surat as $jenis_surat)
                                            <tr role="row">
                                                {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                                <td class="text-center">{{ $jenis_surat->id }}</td>
                                                <td>{{ $jenis_surat->nama_jenis_surat }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-toggle="modal" data-target="#modal_detail_surat">Detail
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
