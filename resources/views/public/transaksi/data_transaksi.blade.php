@extends('public.layouts.master')
@section('title')
    Data transaksi
@endsection
@section('content')
    <section class="site-section border-bottom" id="beli-section">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row my-1 justify-content-center">
                <table class="table">
                    @include('vendor.flash_message')
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama penjual</th>
                            <th>Harga tanah</th>
                            <th>Bukti transfer</th>
                            <th>Status transaksi</th>
                            @foreach ($data_transaksi as $transaksi)
                                @if ($transaksi->bukti_transfer == null)
                                    <th>Aksi</th>
                                @endif
                                @if ($transaksi->gambar_resi != null)
                                    <th>Gambar resi</th>
                                    <th>Aksi</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $transaksi)
                            <tr>
                                <th>{{ $transaksi->user_penjual->name }}</th>
                                <td>{{ $transaksi->data_tanah->harga_tanah }}</td>
                                <td>
                                    @if ($transaksi->bukti_transfer == null)
                                        <form action="/kirimbuktitransfer/{{ $transaksi->id }}" method="post"
                                            enctype="multipart/form-data" id="bukti_transfer_form">
                                            @csrf
                                            <input type="file" name="bukti_transfer" id="bukti_transfer"
                                                onchange="form.submit()">
                                        </form>
                                        Bukti transfer belum ada
                                    @else
                                        <img class="img img-fluid image-file" src="{{ asset($transaksi->bukti_transfer) }}"
                                            alt="">
                                    @endif
                                </td>
                                <td>
                                    @if ($transaksi->status_transaksi == null)
                                        <span class="text-warning">
                                            Transaksi anda belum di proses
                                        </span>
                                    @elseif ($transaksi->status_transaksi == 0)
                                        <span class="text-danger">
                                            Transaksi anda tidak dapat di proses
                                        </span>
                                    @elseif ($transaksi->status_transaksi == 1)
                                        <span class="text-info">
                                            Transaksi dalam proses validasi bukti transfer
                                        </span>
                                    @elseif ($transaksi->status_transaksi == 2)
                                        <span class="text-info">
                                            Transaksi andadilanjutkan ke proses pengiriman berkas dari penjual, kami sudah
                                            menginformasikan kepada penjual, mohon ditunggu
                                        </span>
                                    @elseif ($transaksi->status_transaksi == 3)
                                        <span class="text-success">
                                            Penjual sudah mengirimkan berkas tanah anda, mohon tunggu berdasaikan resi
                                            berikut
                                            <img src="#" alt="resi">
                                        </span>
                                    @elseif ($transaksi->status->transaksi == 4 )
                                        <span class="text-success">
                                            Transaksi anda selesai, kami sudah mengirimkan uang anda kepada penjual
                                        </span>
                                    @endif
                                </td>
                                @if ($transaksi->bukti_transfer == null)
                                    <td>
                                        <form action="/transaksi/batal/{{ $transaksi->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="null">
                                            <button type="submit" class="">Batalkan</button>
                                        </form>
                                    </td>
                                @elseif ($transaksi->gambar_resi != null)
                                    <td>
                                        <img class="img img-fluid image-file" src="{{ asset($transaksi->gambar_resi) }}"
                                            alt="">
                                    </td>
                                    <td>
                                        <form action="/transaksi/selesai/{{ $transaksi->id }}" method="post">
                                            @csrf
                                            <input type="hidden" name="null">
                                            <button type="submit" class="">Selesai</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
