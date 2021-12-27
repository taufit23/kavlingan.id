@extends('public.penjual.layouts.master')
@section('title')
    Data Transaksi
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-1 justify-content-center">
                <table class="table">
                    @include('vendor.flash_message')
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nama pembeli</th>
                            <th scope="col">informasi tanah</th>
                            <th scope="col">Bukti transfer</th>
                            <th scope="col">Status transaksi</th>
                            <th scope="col">Gambar resi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $transaksi)
                            <tr>
                                <th>
                                    {{ $transaksi->user_pembeli->name }}
                                </th>
                                <th>
                                    Rp. {{ number_format($transaksi->data_tanah->harga_tanah, 2) }}
                                </th>
                                <th>
                                    <img src="{{ asset($transaksi->bukti_transfer) }}" alt="" height="100px">
                                </th>
                                <th>
                                    {{ $transaksi->status_transaksi }}
                                </th>
                                <th>
                                    @if ($transaksi->gambar_resi == null)
                                        <form action="/kirimresi/{{ $transaksi->id }}" method="post"
                                            enctype="multipart/form-data" id="gambar_resi_form">
                                            @csrf
                                            <input type="file" name="gambar_resi" id="gambar_resi" onchange="form.submit()">
                                        </form>
                                        Bukti transfer belum ada
                                    @else
                                        <img class="img img-fluid image-file" src="{{ asset($transaksi->gambar_resi) }}"
                                            alt="" height="100px">
                                    @endif
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@stop
