@extends('public.layouts.master')
@section('title')
    Data transaksi
@endsection
@section('content')
    <section class="site-section border-bottom" id="beli-section">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row my-1 justify-content-center">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama penjual</th>
                            <th scope="col">Harga tanah</th>
                            <th scope="col">Bukti transfer</th>
                            <th scope="col">Status transaksi</th>
                            <th scope="col">Aksi</th>
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
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="bukti_transfer" class="btn btn-sm btn-outline-primary">
                                            <button class="bnt btn-sm btn-outline-secondary" type="submit">Upload</button>
                                        </form>
                                        Bukti transfer belum ada
                                    @else
                                        Bukti transfer sudah dikirimkan
                                    @endif
                                </td>
                                <td>
                                    @if ($transaksi->status_transaksi == null)
                                        Transaksi anda dalam proses
                                    @elseif ($transaksi->status_transaksi == 0)
                                        Transaksi anda tidak valid
                                    @elseif ($transaksi->status_transaksi == 1)
                                        Transaksi anda di proses ke proses pengiriman surat tanah
                                    @elseif ($transaksi->status_transaksi == 2)
                                        Transaksi anda selesai
                                    @endif
                                </td>
                                <td>
                                    <a href="/transaksi/batal/{{ $transaksi->id }}"
                                        class="btn btn-sm btn-outline-warning">Batalkan</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
