@extends('public.penjual.layouts.master')
@section('title')
    Nomor Surat
    {{ $data->nomor_surat }}
@endsection
@section('content')

    <div id="colorlib-main">
        <div class="container-fluid">
            <div class="row my-2">
                <div class="px-2 col-md-6">
                    <div class="project-info-box mt-0">
                        <h5>{{ $data->deskripsi_tanah }}</h5>
                    </div>

                    <div class="project-info-box">
                        <p>Status:
                            @if ($data->status == null)
                                <b class="float-right text-warning">Belum divalidasi</b>
                                <p class="text-right">Mohon tunggu informasi berikutnya melalui email.</p>
                            @elseif ($data->status == 0)
                                <b class="float-right text-danger">Validasi ditolak</b>
                                <p class="text-right">Silahkan edit data tanah anda melalui tombol edit di bawah</p>
                            @elseif ($data->status == 1)
                                <b class="float-right text-success">Valid</b>
                                <p class="text-right">Data tanah anda sudah dikomersialisasikan ke pembeli</p>
                            @endif
                        </p>
                        <hr>
                        <p>Jenis surat: <b class="float-right">{{ $jenis_surat->nama_jenis_surat }}</b></p>
                        <hr>
                        <p>Nomor surat: <b class="float-right">{{ $data->nomor_surat }}</b></p>
                        <hr>
                        <p>Nama pemilik: <b class="float-right">{{ $data->nama_pemilik }}</b></p>
                        <hr>
                        <p>Luas tanah:
                            <b class="float-right">
                                {{ $data->panjang_tanah . ' x ' . $data->lebar_tanah }} M<sup>2</sup>
                            </b>
                        </p>
                        <hr>
                        <p>Fasilitas tanah: <b class="float-right">{{ $data->fasilitas_tanah }}</b></p>
                        <hr>
                        <p>Harga tanah: <b class="float-right">Rp.
                                {{ number_format($data->harga_tanah), 0, ',', ',', '.' }}</b></p>
                        <hr>
                        <p>Alamat tanah: <b class="float-right">{{ $data->alamat }}</b></p>
                        <hr>
                        <div class="row justify-content-end">
                            <a href="" class="btn btn-sm btn-outline-danger mx-2">Tandai terjual</a>
                            @if ($data->status == '0')
                                <a href="{{ route('penjual.data_tanah.edit', [$data->id]) }}"
                                    class="btn btn-sm btn-outline-primary">Edit</a>
                            @endif
                        </div>
                    </div>
                </div><!-- / column -->
                <div class="px-2 col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <a type="button" data-toggle="modal" data-target="#modalgambarbidangtanah">
                                <img src="{{ asset($data->gambar_bidang_tanah) }}" alt="project-image"
                                    class="img img-fluid img-thumbnail">
                            </a>
                            <div class="project-info-box">
                                <p><b>File:</b> Gambar bidang tanah</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <a type="button" data-toggle="modal" data-target="#modalgambarsurat">
                                <img src="{{ asset($data->gambar_surat) }}" alt="project-image"
                                    class="img img-fluid img-thumbnail">
                            </a>
                            <div class="project-info-box">
                                <p><b>File:</b> Gambar sertifikat</p>
                            </div>
                        </div>
                    </div>
                </div><!-- / column -->
            </div>
        </div>



    </div>
    <!-- /.container -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalgambarsurat" tabindex="-1" role="dialog" aria-labelledby="modalgambarsuratLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($data->gambar_surat == null)
                        <span>Segera upload gambar sertifikat anda!</span>
                    @endif
                    <img class="btn p-0 card-img3 image-small" @if ($data->gambar_surat == null) style="height: 200px" @endif
                        src="{{ $data->getGambarsurat() }}">
                    <form class="form-horizontal" role="form"
                        action="/{{ $data->id }}/penjual/data_tanah/detail/upload_gambar_surat" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <h6 class="mt-2">
                            @if ($data->gambar_surat == null)
                                <span class="text-danger">Ingat, gambar surat hanya dapat diupload sekali</span>
                            @endif
                        </h6>
                        @if ($data->gambar_surat == null)
                            <label class="custom-file">
                                <input type="file" name="gambar_surat" id="gambar_surat"
                                    class="form-control @error('gambar_surat') is-invalid @enderror">
                                @error('gambar_surat')
                                    <span class="invalid-feedback">
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    </span>
                                @enderror
                                <button type="submit" class="my-2 btn btn-sm btn-outline-success">Upload</button>
                            </label>

                        @endif

                    </form>
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
                    <img class="btn p-0 card-img3 image-small" src="{{ $data->gambar_bidang_tanah }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
