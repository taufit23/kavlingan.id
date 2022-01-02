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
                            <th scope="col">Informasi pembeli</th>
                            <th scope="col">Informasi tanah</th>
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
                                    <a type="button" data-toggle="modal" data-target="#modalpembeli">
                                        {{ $transaksi->user_pembeli->name }}
                                    </a>
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
    {{-- modal informasi pembeli --}}
    @foreach ($data_transaksi as $transaksi)
        <div class="modal fade" id="modalpembeli" tabindex="-1" role="dialog" aria-labelledby="modalpembeliTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informasi Pembeli tanah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <strong>Informasi personal </strong>
                            <div class="body">
                                <small class="text-muted">Nama Lengkap: </small>
                                <p>{{ $transaksi->user_pembeli->name }}</p>
                                <small class="text-muted">Tempat/Tanggal lahir: </small>
                                <p>{{ $transaksi->user_pembeli->ktp_user->tempat_lahir . '/ ' . $transaksi->user_pembeli->ktp_user->tanggal_lahir }}
                                </p>
                                <small class="text-muted">Jenis kelamin: </small>
                                <p>
                                    @if ($transaksi->user_pembeli->ktp_user->jenis_kelamin == 'Lk')
                                        Laki - laki
                                    @else
                                        Perempuan
                                    @endif
                                </p>
                                {{-- <small class="text-muted">Foto KTP: </small>
                                <img src="{{ $transaksi->user_pembeli->ktp_user->foto_ktp }}" class="shadow "
                                    alt="profile-image" width="200"><br>
                                <small class="text-muted">Nomor KTP: </small>
                                <p>{{ $transaksi->user_pembeli->ktp_user->no_ktp }}
                                </p> --}}
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi akun </strong>
                            <div class="body">
                                <small class="text-muted">Alamat email: </small>
                                <p>{{ $transaksi->user_pembeli->email }}</p>
                                <small class="text-muted">Nomor handphone: </small>
                                <p>{{ $transaksi->user_pembeli->no_hp }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi alamat </strong>
                            <div class="body">
                                <li class="list-unstyled">Provinsi : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->provinsi }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kabupaten / Kota : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->kota_kabupaten }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kecamatan : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->kecamatan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Desa / Kelurahan : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->desa_kelurahan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">No RT/RW : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->no_rt . ' / ' . $transaksi->user_pembeli->alamat_user->no_rw }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Nama jalan : <span class="float-sm-right">

                                        {{ $transaksi->user_pembeli->alamat_user->jalan }}
                                    </span>
                                </li>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi pekerjaan </strong>
                            <div class="body">
                                <li class="list-unstyled">Pekerjaan : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->nama_pekerjaan }}
                                    </span>
                                </li>
                                <hr>
                                <strong>Alamat tempat kerja</strong>
                                <li class="list-unstyled">Provinsi : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->provinsi }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kabupaten / Kota : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->kota_kabupaten }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kecamatan : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->kecamatan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Desa / Kelurahan : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->desa_kelurahan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Nama jalan : <span class="float-sm-right">
                                        {{ $transaksi->user_pembeli->pekerjaan_user->jalan }}
                                    </span>
                                </li>
                                <div class="col-12 text-right">
                                    @if (auth()->user()->id_pekerjaan_user == null)
                                        <a href="{{ route('profil.addpekerjaan') }}"
                                            class="btn btn-sm btn-outline-warning">
                                            Tambahkan pekerjaan
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal informasi pembeli --}}
@stop
