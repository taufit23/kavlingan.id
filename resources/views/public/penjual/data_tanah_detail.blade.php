@extends('public.penjual.layouts.master')
@section('title')
    Nomor Surat
    @foreach ($data as $datatanah)
        @if ($datatanah->id_surat_tanah != null)
            {{ $datatanah->surat_tanah->nomor_surat }}
        @else
            Tanah ditolak
        @endif
    @endforeach
@endsection
@section('content')
    @foreach ($data as $data_tanah)
        <div id="colorlib-main">
            <div class="container-fluid">
                <div class="row my-2 justify-content-center">
                    <div class="col-md-5">
                        <div id="gambarbidangtanahcorouser" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($data_tanah->Gambarbidangtanah as $key => $gambartanah)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($gambartanah->gambar_bidang_tanah) }}" class="d-block w-100"
                                            alt="..." height="250px" height="250px">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#gambarbidangtanahcorouser" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#gambarbidangtanahcorouser" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="project-info-box">
                                <p><b>File:</b> Gambar bidang tanah</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div id="gambarsuratcorousel" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($data_tanah->Gambarsurat as $key => $gambarsurat)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset($gambarsurat->gambar_surat) }}" class="d-block w-100"
                                            alt="..." height="250px">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#gambarsuratcorousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#gambarsuratcorousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <div class="project-info-box">
                                <p><b>File:</b> Gambar surat tanah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 justify-content-center">
                    <div class="mx-2 col-md-10  card">
                        <div class="project-info-box mt-0">
                            <h5>{{ $data_tanah->deskripsi_tanah }}</h5>
                        </div>
                        <div class="project-info-box card-body">
                            <p>Status:
                                @if ($data_tanah->status == null)
                                    <b class="float-right text-warning">Belum divalidasi</b>
                                    <p class="text-right">Mohon tunggu informasi berikutnya melalui email.</p>
                                @elseif ($data_tanah->status == 0)
                                    <b class="float-right text-danger">Validasi ditolak</b>
                                    <p class="text-right">Silahkan edit data tanah anda melalui tombol edit di bawah</p>
                                @elseif ($data_tanah->status == 1)
                                    <b class="float-right text-success">Valid</b>
                                    <p class="text-right">Data tanah anda sudah dikomersialisasikan ke pembeli</p>
                                @endif
                            </p>
                            <hr>
                            <p>Jenis surat: <b
                                    class="float-right">{{ $data_tanah->tabel_jenis_surat->nama_jenis_surat }}</b>
                            </p>
                            <hr>
                            <p>Nomor surat: <b class="float-right">
                                    @if ($datatanah->id_surat_tanah != null)
                                        {{ $data_tanah->surat_tanah->nomor_surat }}
                                    @else
                                        Variabel ini ditolak
                                    @endif
                                </b></p>
                            <hr>
                            <p>Nama pemilik: <b class="float-right">
                                    @if ($datatanah->id_surat_tanah != null)
                                        {{ $data_tanah->surat_tanah->nama_pemilik }}
                                    @else
                                        Variabel ini ditolak
                                    @endif
                                </b>
                            </p>
                            <hr>
                            <p>Luas tanah:
                                <b class="float-right">
                                    @if ($datatanah->id_surat_tanah != null)
                                        {{ $data_tanah->surat_tanah->panjang_tanah . ' x ' . $data_tanah->surat_tanah->lebar_tanah }}
                                        M<sup>2</sup>
                                    @else
                                        Variabel ini ditolak
                                    @endif
                                </b>
                            </p>
                            <hr>
                            <p>Fasilitas tanah: <b class="float-right">{{ $data_tanah->fasilitas_tanah }}</b></p>
                            <hr>
                            <p>Harga tanah: <b class="float-right">Rp.
                                    {{ number_format($data_tanah->harga_tanah), 0, ',', ',', '.' }}</b></p>
                            <hr>
                            <p>Alamat tanah:
                                <b class="float-right">
                                    <span>
                                        {{ $data_tanah->Alamat_tanah->jalan }},
                                    </span>
                                    <span>Rt
                                        {{ $data_tanah->Alamat_tanah->no_rt }},
                                    </span>
                                    <span>Rw
                                        {{ $data_tanah->Alamat_tanah->no_rw }},
                                    </span>
                                    <span>
                                        {{ $data_tanah->Alamat_tanah->desa_kelurahan }},
                                    </span>
                                    <span>
                                        {{ $data_tanah->Alamat_tanah->kecamatan }},
                                    </span>
                                    <span>
                                        {{ $data_tanah->Alamat_tanah->kabupaten_kota }},
                                    </span>
                                    <span>
                                        {{ $data_tanah->Alamat_tanah->provinsi }},
                                    </span>

                                </b>
                            </p>
                            <hr>
                            <div class="row justify-content-end">
                                <a href="" class="btn btn-sm btn-outline-danger mx-2">Tandai terjual</a>
                                @if ($data_tanah->status == '0' and $data_tanah->id_surat_tanah == null)
                                    <a href="{{ route('penjual.data_tanah.edit', [$data_tanah->id]) }}"
                                        class="btn btn-sm btn-outline-primary">Edit surat tanah</a>
                                @elseif ($data_tanah->status == '0' and $data_tanah->id_surat_tanah != null)
                                    <a href="{{ route('penjual.data_tanah.edit', [$data_tanah->id]) }}"
                                        class="btn btn-sm btn-outline-primary">Edit foto bidang tanah</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <!-- Modal -->
        <div class="modal fade" id="modalgambarsurat" tabindex="-1" role="dialog"
            aria-labelledby="modalgambarsuratLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        @if ($data_tanah->Gambarsurat == null)
                            <span>Segera upload gambar sertifikat anda!</span>
                        @endif
                        <img class="btn p-0 card-img3 image-small" @if ($data_tanah->gambar_surat == null) style="height: 200px" @endif
                            src="{{ $data_tanah->getGambarsurat() }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="modalgambarbidangtanah" tabindex="-1" role="dialog"
            aria-labelledby="modalgambarbidangtanahLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img class="btn p-0 card-img3 image-small" src="{{ $data_tanah->gambar_bidang_tanah }}">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
