@extends('private.layouts.master')
@section('title')
    Data Transaksi
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                @include('vendor.flash_message')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Info pembeli</th>
                                <th>Info penjual</th>
                                <th>Info tanah</th>
                                <th>Bukti transfer</th>
                                <th>Status transaksi</th>
                                <th>Gambar resi</th>
                                <th>Status pengirimanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_transaksi as $transaksi)
                                <tr>
                                    <td>
                                        {{ $transaksi->user_pembeli->name }}
                                    </td>
                                    <td>
                                        {{ $transaksi->user_penjual->name }}
                                    </td>
                                    <td>
                                        Rp. {{ number_format($transaksi->data_tanah->harga_tanah, 2) }}
                                    </td>
                                    <td>
                                        <a href="{{ asset($transaksi->bukti_transfer) }}" target="_blank">
                                            <img src="{{ asset($transaksi->bukti_transfer) }}" alt="" width="50"
                                                height="50">
                                        </a>
                                    </td>
                                    <td>
                                        {{ $transaksi->status_transaksi }}
                                    </td>
                                    <td>
                                        <a href="{{ asset($transaksi->gambar_resi) }}" target="_blank">
                                            <img src="{{ asset($transaksi->gambar_resi) }}" alt="" width="50" height="50">
                                        </a>
                                    </td>
                                    <td>
                                        {{ $transaksi->status_penerimaan_barang }}
                                    </td>
                                    <td>
                                        <a href="/private_transaksi/accbukti/{{ $transaksi->id }}"
                                            class="btn btn-outline-success btn-sm mt-1">Acc
                                            bukti transfer</a>
                                        <a href="/private_transaksi/refuse/{{ $transaksi->id }}"
                                            class="btn btn-outline-danger btn-sm mt-1">Refuse bukti transfer</a>
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
