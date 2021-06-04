@extends('private.layouts.master')
@section('title')
    Users Role
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
                                <form class="navbar-form navbar-right" method="GET"
                                    action="{{ route('private.users.role_users') }}">
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
                                    <label>Tambah Role :
                                        <button type="button" class="btn btn-sm btn-facebook form-control form-control-sm"
                                            data-toggle="modal" data-target="#modal_tambah_role_user"><i
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
                                            <th class="text-center" tabindex="0" aria-controls="dataTable" aria-rowspan="1"
                                                aria-colspan="1">Id Role
                                            </th>
                                            <th tabindex="0" aria-controls="dataTable" aria-rowspan="1" aria-colspan="1">
                                                Nama Role
                                            </th>
                                            <th class="text-center" tabindex="0" aria-controls="dataTable" aria-rowspan="1"
                                                aria-colspan="1">Deskripsi Role
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        {{-- @php $no = 1; @endphp --}}
                                        @foreach ($tabel_role as $role)
                                            <tr role="row">
                                                {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                                <td class="text-center">{{ $role->id }}</td>
                                                <td>{{ $role->nama_role }}</td>
                                                <td>{{ $role->deskripsi_role }}</td>
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
