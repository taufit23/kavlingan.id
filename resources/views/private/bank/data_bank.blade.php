@extends('private.layouts.master')
@section('title')
    Data bank
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">

            <div class="row p-3">
                <div class="col-sm-12 col-md-6">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data bank</h6>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label>Tambah data bank :
                            <button type="button" class="btn btn-sm btn-facebook form-control form-control-sm"
                                data-toggle="modal" data-target="#modal_tambah_bank"><i class="fas fa-plus"></i></button>
                        </label>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama bank</th>
                                <th>Contact bank</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama bank</th>
                                <th>Contact bank</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data_bank as $bank)
                                <tr>
                                    <td>{{ $bank->nama_bank }}</td>
                                    <td>
                                        <a href="{{ route('private.data_bank.detail', [$bank->id]) }}">
                                            {{ $bank->contact_bank }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('private.detail_tanah', [$bank->id]) }}"
                                            class="btn btn-sm btn-outline-info">Detail</a>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
