@extends('private.layouts.master')
@section('title')
    Detail tanah
@endsection

@section('content')
    <div class="container-fluid">
        @include('vendor.flash_message')
        <div class="row">
            @foreach ($tanah as $tana)
                <div class="col-xl-4">
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Gambar bidang tanah</div>
                        <div class="card-body text-center">
                            <div id="gambartanah{{ $tana->id }}" class="carousel slide carousel-fade"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($tana->Gambarbidangtanah as $key => $gambartanah)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($gambartanah->gambar_bidang_tanah) }}"
                                                class="d-block w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#gambartanah{{ $tana->id }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#gambartanah{{ $tana->id }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-xl-0 mt-2">
                        <div class="card-header">Gambar surat tanah</div>
                        <div class="card-body text-center">
                            <div id="gambarsurat{{ $tana->id }}" class="carousel slide carousel-fade"
                                data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($tana->Gambarsurat as $key => $gambarsurat)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset($gambarsurat->gambar_surat) }}" class="d-block w-100"
                                                alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#gambarsurat{{ $tana->id }}" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#gambarsurat{{ $tana->id }}" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">Nama penjual :
                            {{ $tana->user->name }}
                        </div>
                        <table class="table table-light table-hover table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-light">Jenis surat : </th>
                                    <td class="bg-gradient-light text-primary">
                                        {{ $tana->Tabel_jenis_surat->nama_jenis_surat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Nomor surat :</th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($tana->id_surat_tanah != null)
                                            {{ $tana->Surat_tanah->nomor_surat }}
                                        @else Null
                                        @endif
                                        <form action="/{{ $tana->id }}/{{ $tana->user->id }}/tolak_nomor_surat"
                                            method="POST" class="float-right mx-1">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Anda akan menghapus nomor surat tanah yang dimasukan penjual, Yakin?');">Tolak
                                                nomor surat</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Nama pemilik : </th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($tana->id_surat_tanah != null)
                                            {{ $tana->Surat_tanah->nama_pemilik }}
                                        @else
                                            Null
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Luas tanah :</th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($tana->id_surat_tanah != null)
                                            {{ $tana->Surat_tanah->panjang_tanah . ' x ' . $tana->Surat_tanah->lebar_tanah }}
                                        @else
                                            Null
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Fasilitas tanah: </th>
                                    <td class="bg-gradient-light text-primary">{{ $tana->fasilitas_tanah }}</td>
                                </tr>
                                <tr>
                                    <th class="text-light">Harga tanah: </th>
                                    <td class="bg-gradient-light text-primary">Rp.
                                        {{ number_format($tana->harga_tanah) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Alamat : </th>
                                    <td class="bg-gradient-light text-primary">
                                        @if ($tana->id_alamat_tanah != null)
                                            <strong>Jalan : </strong><span>{{ $tana->Alamat_tanah->jalan }}</span><br>
                                            <strong>RT : </strong><span>{{ $tana->Alamat_tanah->no_rw }}</span><br>
                                            <strong>RW : </strong><span>{{ $tana->Alamat_tanah->no_rw }}</span><br>
                                            <strong>Desa/Kelurahan :
                                            </strong><span>{{ $tana->Alamat_tanah->desa_kelurahan }}</span><br>
                                            <strong>Kecamatan :
                                            </strong><span>{{ $tana->Alamat_tanah->kecamatan }}</span><br>
                                            <strong>Kabupaten/Kota :
                                            </strong><span>{{ $tana->Alamat_tanah->kota_kabupaten }}</span><br>
                                            <strong>Provinsi :
                                            </strong><span>{{ $tana->Alamat_tanah->provinsi }}</span><br>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-light">Deskripsi tanah: </th>
                                    <td class="bg-gradient-light text-primary">{{ $tana->deskripsi_tanah }}</td>
                                </tr>
                                <tr>
                                    <th class="text-light">Status tanah: </th>
                                    @if ($tana->status == null)
                                        <td class="bg-gradient-light text-warning">
                                            <div class="row">
                                                <div class="col">
                                                    Tanah belum di validasi
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="/{{ $tana->id }}/{{ $tana->user->id }}/terima_validasi_tanah"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-success"
                                                            onclick="return confirm('Yakin untuk menyatakan data tanah ini valid?');">Terima
                                                            validasi</button>
                                                    </form>
                                                    <form
                                                        action="/{{ $tana->id }}/{{ $tana->user->id }}/tolak_validasi_tanah"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Sudahkah anda menghapus variabel yang ditolak dari data tanah ini?');">Tolak
                                                            validasi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @elseif ($tana->status == 0)
                                        <td class="bg-gradient-light text-danger">
                                            <div class="row">
                                                <div class="col">
                                                    Validasi tanah ditolak
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="/{{ $tana->id }}/{{ $tana->user->id }}/terima_validasi_tanah"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-success"
                                                            onclick="return confirm('Yakin untuk menyatakan data tanah ini valid?');">Terima
                                                            validasi</button>
                                                    </form>
                                                    <form
                                                        action="/{{ $tana->id }}/{{ $tana->user->id }}/tolak_validasi_tanah"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Sudahkah anda menghapus variabel yang ditolak dari data tanah ini?');">Tolak
                                                            validasi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @elseif ($tana->status == 1)
                                        <td class=" bg-gradient-light text-success">
                                            <div class="row">
                                                <div class="col">
                                                    Tanah ini sudah valid
                                                </div>
                                                <div class="col">
                                                    <form
                                                        action="/{{ $tana->id }}/{{ $tana->user->id }}/tolak_validasi_tanah"
                                                        method="POST" class="float-right mx-1">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                                            onclick="return confirm('Sudahkah anda menghapus variabel yang ditolak dari data tanah ini?');">Tolak
                                                            validasi</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@stop
