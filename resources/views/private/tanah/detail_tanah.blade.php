@extends('private.layouts.master')
@section('title')
    Detail tanah
@endsection

@section('content')
    <div class="container-fluid">
        @include('vendor.flash_message')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Gambar surat tanah</div>
                    <div class="card-body text-center">
                        <a href="{{ $tanah->gambar_surat }}" target="blank">
                            <img class="img-account-profile img-fluid img-thumbnail mb-2" src="{{ $tanah->gambar_surat }}">
                        </a>
                        <form action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_gambar_surat" method="POST"
                            class="float-right mx-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Anda akan menghapus gambar surat yang dimasukan penjual, Yakin?');">Tolak
                                gambar surat</button>
                        </form>
                    </div>
                </div>
                <div class="card mb-4 mb-xl-0 mt-2">
                    <div class="card-header">Gambar bidang tanah</div>
                    <div class="card-body text-center">
                        <a href="{{ $tanah->gambar_bidang_tanah }}" target="blank">
                            <img class="img-account-profile img-fluid img-thumbnail mb-2"
                                src="{{ $tanah->gambar_bidang_tanah }}">
                        </a>
                        <form action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_gambar_bidang_tanah" method="POST"
                            class="float-right mx-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('Anda akan menghapus gambar bidang tanah yang dimasukan penjual, Yakin?');">Tolak
                                gambar bidang tanah</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Nama penjual :
                        {{ $pengguna->name }}
                    </div>
                    <table class="table table-light table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-light">Jenis surat : </th>
                                <td class="bg-gradient-light text-primary">
                                    @foreach ($jenis_surat as $jenis)
                                        @if ($tanah->id_jenis_surat == $jenis->id)
                                            {{ $jenis->nama_jenis_surat }}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Nomor surat :</th>
                                <td class="bg-gradient-light text-primary">
                                    {{ $tanah->nomor_surat }}
                                    <form action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_nomor_surat"
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
                                    {{ $tanah->nama_pemilik }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Luas tanah :</th>
                                <td class="bg-gradient-light text-primary">
                                    {{ $tanah->panjang_tanah . ' x ' . $tanah->lebar_tanah }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Fasilitas tanah: </th>
                                <td class="bg-gradient-light text-primary">{{ $tanah->fasilitas_tanah }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Harga tanah: </th>
                                <td class="bg-gradient-light text-primary">Rp. {{ number_format($tanah->harga_tanah) }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-light">Alamat : </th>
                                <td class="bg-gradient-light text-primary">{{ $tanah->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Deskripsi tanah: </th>
                                <td class="bg-gradient-light text-primary">{{ $tanah->deskripsi_tanah }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Status tanah: </th>
                                @if ($tanah->status == null)
                                    <td class="bg-gradient-light text-warning">
                                        <div class="row">
                                            <div class="col">
                                                Tanah belum di validasi
                                            </div>
                                            <div class="col">
                                                <form
                                                    action="/{{ $tanah->id }}/{{ $pengguna->id }}/terima_validasi_tanah"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success"
                                                        onclick="return confirm('Yakin untuk menyatakan data tanah ini valid?');">Terima
                                                        validasi</button>
                                                </form>
                                                <form
                                                    action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_validasi_tanah"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Sudahkah anda menghapus variabel yang ditolak dari data tanah ini?');">Tolak
                                                        validasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                @elseif ($tanah->status == 0)
                                    <td class="bg-gradient-light text-danger">
                                        <div class="row">
                                            <div class="col">
                                                Validasi tanah ditolak
                                            </div>
                                            <div class="col">
                                                <form
                                                    action="/{{ $tanah->id }}/{{ $pengguna->id }}/terima_validasi_tanah"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-success"
                                                        onclick="return confirm('Yakin untuk menyatakan data tanah ini valid?');">Terima
                                                        validasi</button>
                                                </form>
                                                <form
                                                    action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_validasi_tanah"
                                                    method="POST" class="float-right mx-1">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Sudahkah anda menghapus variabel yang ditolak dari data tanah ini?');">Tolak
                                                        validasi</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                @elseif ($tanah->status == 1)
                                    <td class=" bg-gradient-light text-success">
                                        <div class="row">
                                            <div class="col">
                                                Tanah ini sudah valid
                                            </div>
                                            <div class="col">
                                                <form
                                                    action="/{{ $tanah->id }}/{{ $pengguna->id }}/tolak_validasi_tanah"
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
        </div>
    </div>
@stop
