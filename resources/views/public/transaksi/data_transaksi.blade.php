@extends('public.penjual.layouts.master')
@section('title')
    Data transaksi
@endsection
@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="col-md-10 my-1 justify-content-center">
                <table class="table">
                    @include('vendor.flash_message')
                    <thead class="thead-dark">
                        <tr>
                            <th>Informasi penjual</th>
                            <th>Informasi pembeli</th>
                            <th>Informasi tanah</th>
                            <th>Bukti transfer</th>
                            <th>Status transaksi</th>
                            @foreach ($data_transaksi as $transaksi)
                                @if ($transaksi->bukti_transfer == null)
                                    <th>Aksi</th>
                                @elseif ($transaksi->status_transaksi == 2)
                                    <th>Jadwal serah terima</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_transaksi as $transaksi)
                            <tr>
                                <th>
                                    <a type="button" data-toggle="modal"
                                        data-target="#modalpenjual{{ $transaksi->user_penjual->id }}">
                                        {{ $transaksi->user_penjual->name }}
                                    </a>
                                </th>
                                <th>
                                    <a type="button" data-toggle="modal"
                                        data-target="#modalpembeli{{ $transaksi->user_pembeli->id }}">
                                        {{ $transaksi->user_pembeli->name }}
                                    </a>
                                </th>
                                <td>
                                    <a type="button" data-toggle="modal"
                                        data-target="#modaltanah{{ $transaksi->data_tanah->id }}">
                                        {{ $transaksi->data_tanah->harga_tanah }}
                                    </a>
                                </td>
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
                                            @if ($transaksi->user_pembeli->id == auth()->user()->id)
                                                Pertemuan anda dengan Penjual : {{ $transaksi->user_penjual->name }} sudah
                                                di atur admin.
                                            @elseif ($transaksi->user_penjual->id == auth()->user()->id)
                                                Pertemuan anda dengan Pembeli: {{ $transaksi->user_pembeli->name }} sudah
                                                di atur admin.
                                            @endif
                                        </span>
                                    @elseif ($transaksi->status_transaksi == 3)
                                        <span class="text-success">
                                            transaksi selesai
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
                                @elseif ($transaksi->status_transaksi == 2)
                                    <td>
                                        {{ $transaksi->jadwal_serah_terima }}
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    {{-- modal informasi penjual --}}
    @foreach ($data_transaksi as $transaksi)
        <div class="modal fade" id="modalpembeli{{ $transaksi->user_pembeli->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalpembeli{{ $transaksi->user_pembeli->id }}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informasi pembeli tanah</h5>
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
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalpenjual{{ $transaksi->user_penjual->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalpenjual{{ $transaksi->user_penjual->id }}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informasi penjual tanah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <strong>Informasi personal </strong>
                            <div class="body">
                                <small class="text-muted">Nama Lengkap: </small>
                                <p>{{ $transaksi->user_penjual->name }}</p>
                                <small class="text-muted">Tempat/Tanggal lahir: </small>
                                <p>{{ $transaksi->user_penjual->ktp_user->tempat_lahir . '/ ' . $transaksi->user_penjual->ktp_user->tanggal_lahir }}
                                </p>
                                <small class="text-muted">Jenis kelamin: </small>
                                <p>
                                    @if ($transaksi->user_penjual->ktp_user->jenis_kelamin == 'Lk')
                                        Laki - laki
                                    @else
                                        Perempuan
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi akun </strong>
                            <div class="body">
                                <small class="text-muted">Alamat email: </small>
                                <p>{{ $transaksi->user_penjual->email }}</p>
                                <small class="text-muted">Nomor handphone: </small>
                                <p>{{ $transaksi->user_penjual->no_hp }}</p>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi alamat </strong>
                            <div class="body">
                                <li class="list-unstyled">Provinsi : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->provinsi }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kabupaten / Kota : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->kota_kabupaten }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Kecamatan : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->kecamatan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Desa / Kelurahan : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->desa_kelurahan }}
                                    </span>
                                </li>
                                <li class="list-unstyled">No RT/RW : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->no_rt . ' / ' . $transaksi->user_penjual->alamat_user->no_rw }}
                                    </span>
                                </li>
                                <li class="list-unstyled">Nama jalan : <span class="float-sm-right">

                                        {{ $transaksi->user_penjual->alamat_user->jalan }}
                                    </span>
                                </li>
                            </div>
                        </div>
                        <div class="card">
                            <strong>Informasi pekerjaan </strong>
                            <div class="body">
                                <li class="list-unstyled">Pekerjaan : <span class="float-sm-right">
                                        {{ $transaksi->user_penjual->pekerjaan_user->nama_pekerjaan }}
                                    </span>
                                </li>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal informasi penjual --}}

        {{-- modal data tanah --}}
        <div class="modal fade" id="modaltanah{{ $transaksi->data_tanah->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modaltanah{{ $transaksi->data_tanah->id }}Title" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informasi tanah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div id="gambartanah{{ $transaksi->data_tanah->id }}"
                                    class="carousel slide carousel-fade card-img-top" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($transaksi->data_tanah->Gambarbidangtanah as $key => $gambartanah)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ asset($gambartanah->gambar_bidang_tanah) }}"
                                                    class="d-block w-100" alt="..." height="250px">
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" href="#gambartanah{{ $transaksi->data_tanah->id }}"
                                        role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#gambartanah{{ $transaksi->data_tanah->id }}"
                                        role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @include('vendor.flash_message')
                                <small class="my-4">{{ $transaksi->data_tanah->deskripsi_tanah }}
                                </small>
                                <ul>
                                    <li>Nama Penjual <span
                                            class="float-right">{{ $transaksi->data_tanah->user->name }}</span>
                                    </li>
                                    <li>Nama pemilik <span
                                            class="float-right">{{ $transaksi->data_tanah->surat_tanah->nama_pemilik }}</span>
                                    </li>
                                    <li>Jenis surat <span class="float-right">
                                            {{ $transaksi->data_tanah->tabel_jenis_surat->nama_jenis_surat }}
                                        </span></li>
                                    <li>Nomor surat<span
                                            class="float-right">{{ $transaksi->data_tanah->surat_tanah->nomor_surat }}</span>
                                    </li>
                                    <li>Alamat tanah<span class="float-right">
                                            {{ $transaksi->data_tanah->alamat_tanah->jalan }},
                                            {{ $transaksi->data_tanah->alamat_tanah->no_rt }},
                                            {{ $transaksi->data_tanah->alamat_tanah->no_rw }},
                                            {{ $transaksi->data_tanah->alamat_tanah->desa_kelurahan }},
                                            {{ $transaksi->data_tanah->alamat_tanah->kecamatan }},
                                            {{ $transaksi->data_tanah->alamat_tanah->kota_kabupaten }},
                                            {{ $transaksi->data_tanah->alamat_tanah->provinsi }}
                                        </span>
                                    </li>
                                    <li>Fasilitas tanah<span
                                            class="float-right">{{ $transaksi->data_tanah->fasilitas_tanah }}</span>
                                    </li>
                                    <li>Harga jual tanah<span class="float-right">Rp.
                                            {{ number_format($transaksi->data_tanah->harga_tanah), 2 }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal data tanah --}}
@endsection
