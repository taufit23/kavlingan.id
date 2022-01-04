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
                                <th>Jaddwal serah terima</th>
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
                                        @if ($transaksi->status_transaksi == null)
                                            Bukti transaksi belum ada
                                        @elseif ($transaksi->status_transaksi == 1)
                                            Menunggu validasi bukti transfer
                                        @elseif ($transaksi->status_transaksi == 2)
                                            Proses serah terima
                                        @elseif ($transaksi->status_transaksi == 3)
                                            Transaksi selesai
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaksi->status_transaksi == 2)
                                            @if ($transaksi->jadwal_serah_terima != null)
                                                {{ $transaksi->jadwal_serah_terima . ' Jam ' . $transaksi->jam_serah_terima }}
                                            @else
                                                Mohon ditambahkan
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($transaksi->status_transaksi == 1)
                                            @if ($transaksi->bukti_transfer != null)
                                                <a href="/private_transaksi/accbukti/{{ $transaksi->id }}"
                                                    class="btn btn-outline-success btn-sm mt-1">Terima
                                                    bukti transfer</a>
                                                <a href="/private_transaksi/refuse/{{ $transaksi->id }}"
                                                    class="btn btn-outline-danger btn-sm mt-1">Tolak bukti transfer</a>
                                            @else
                                                Pembeli belum upload buktri transfer
                                            @endif
                                        @elseif ($transaksi->status_transaksi == 2)
                                            @if ($transaksi->jadwal_serah_terima == null)
                                                <a type="button" data-toggle="modal"
                                                    data-target="#modaladdserahterima{{ $transaksi->id }}"
                                                    class="btn btn-outline-success btn-sm mt-1">
                                                    Tambah jadwal serah terima
                                                </a>
                                            @endif
                                            <a href="/private_transaksi/selesai_transaksi/{{ $transaksi->id }}"
                                                class="btn btn-sm btn-outline-success">Tandai selesai</a>
                                        @else
                                            Transaksi selesai
                                        @endif
                                    </td>
                                </tr>

                                <div class="modal fade" id="modaladdserahterima{{ $transaksi->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="modaladdserahterima{{ $transaksi->id }}Title"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah jadwal serah
                                                    terima</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form
                                                    action="/private_transaksi/addjadwalserahterima/{{ $transaksi->id }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-black"
                                                                    for="jadwal_serah_terima">Tanggal dan
                                                                    jam</label>
                                                                <input type="date" id="jadwal_serah_terima"
                                                                    name="jadwal_serah_terima" class="form-control"
                                                                    placeholder="Tambahkan jadwal serah terima">
                                                                @error('jadwal_serah_terima')
                                                                    <span class="invalid-feedback">
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="text-black" for="jam_serah_terima">Jam dan
                                                                    jam</label>
                                                                <input type="time" id="jam_serah_terima"
                                                                    name="jam_serah_terima" class="form-control"
                                                                    placeholder="Tambahkan jadwal serah terima">
                                                                @error('jam_serah_terima')
                                                                    <span class="invalid-feedback">
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right">
                                                            <button type="submit" class="btn btn-info">Tambahkan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
