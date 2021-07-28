@extends('public.penjual.layouts.master')
@section('title')
    Nomor Surat @foreach ($data as $d)
        {{ $d->nomor_surat }}
    @endforeach
@endsection

@section('content')
    @foreach ($data as $d)
        <div id="colorlib-main">
            <div class="container">

                <!-- Portfolio Item Heading -->
                <h1 class="my-4">{{ $d->deskripsi_tanah }}
                    {{-- <small>Secondary Text</small> --}}
                </h1>

                <!-- Portfolio Item Row -->
                <div class="row">

                    <div class="col-md-6">
                        <div class="col-md-12 my-2">
                            <form class="form-horizontal" role="form"
                                action="/{{ $d->id }}/penjual/data_tanah/detail/upload_gambar" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <img class="img-fluid" src="{{ $d->getGambartanah() }}" alt=""
                                    style="height: 450px; weight: 300px;">
                                <label class="custom-file my-3">
                                    <input type="file" name="gambar_bidang_tanah" id="gambar_bidang_tanah"
                                        class="form-control @error('gambar_bidang_tanah') is-invalid @enderror">
                                    @error('gambar_bidang_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </label>
                                <button type="submit" class="my-3 btn btn-sm btn-outline-dark btn-rounded float-right">
                                    Upload
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="my-3">Project Details</h3>
                        <ul>
                            <li>Nama Penjual <span class="float-right">{{ auth()->user()->name }}</span></li>
                            <li>Nama pemilik <span class="float-right">{{ $d->nama_pemilik }}</span></li>
                            <li>Jenis surat <span class="float-right">
                                    @foreach ($jenis_surat as $jenis)
                                        {{ $jenis->nama_jenis_surat }}
                                    @endforeach
                                </span></li>
                            <li>Nomor surat<span class="float-right">{{ $d->nomor_surat }}</span></li>
                            <li>Alamat tanah<span class="float-right">{{ $d->alamat_tanah }}</span></li>
                            <li>Fasilitas tanah<span class="float-right">{{ $d->fasilitas_tanah }}</span></li>
                            <li>Status tanah<span class="float-right">{{ $d->status_tanah }}</span></li>
                            <li>Harga jual tanah<span class="float-right">Rp.
                                    {{ number_format($d->harga_tanah), 2 }}</span></li>
                            @if ($d->status_tanah == 'BISA_BOOKING')
                                <li>Harga booking<span class="float-right">Rp.
                                        {{ number_format($d->harga_booking_tanah), 2, '.', '.' }}</span></li>
                            @endif
                        </ul>

                        <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal"
                            data-target="#modalgambarsurat">
                            Gambar surat
                        </button>
                    </div>

                </div>
                <!-- /.row -->

                {{-- <!-- Related Projects Row -->
                <h3 class="my-4">Related Projects</h3>

                <div class="row">

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="#">
                            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="#">
                            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="#">
                            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 mb-4">
                        <a href="#">
                            <img class="img-fluid" src="http://placehold.it/500x300" alt="">
                        </a>
                    </div>

                </div>
                <!-- /.row --> --}}

            </div>
            <!-- /.container -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalgambarsurat" tabindex="-1" role="dialog" aria-labelledby="modalgambarsuratLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        @if ($d->gambar_surat == null)
                            <span>Segera upload gambar sertifikat anda!</span>
                        @endif
                        <img class="btn p-0 card-img3 image-small" @if ($d->gambar_surat == null) style="height: 200px" @endif
                            src="{{ $d->getGambarsurat() }}">
                        <form class="form-horizontal" role="form"
                            action="/{{ $d->id }}/penjual/data_tanah/detail/upload_gambar_surat" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h6 class="mt-2">
                                @if ($d->gambar_surat == null)
                                    <span class="text-danger">Ingat, gambar surat hanya dapat diupload sekali</span>
                                @endif
                            </h6>
                            @if ($d->gambar_surat == null)
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

    @endforeach
@endsection
