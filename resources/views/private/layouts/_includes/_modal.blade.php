{{-- modal detail halaman jenis surat --}}


<!-- Modal tambah jenis surat -->
<div class="modal fade" id="modal_tambah_jenis_surat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah jenis surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form class="user" action="/private_jenis_surat" method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="nama_jenis_surat" type="text" value="{{ old('nama_jenis_surat') }}"
                                class="form-control  @error('nama_jenis_surat') is-invalid @enderror"
                                id="nama_jenis_surat" placeholder="Masukan jenis surat">
                            @error('nama_jenis_surat')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="keterangan_jenis_surat" id="keterangan_jenis_surat" cols="30" rows="10"
                                class="form-control  @error('keterangan_jenis_surat') is-invalid @enderror">{{ old('keterangan_jenis_surat') }}</textarea>
                            @error('keterangan_jenis_surat')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block my-1">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah Role User -->
<div class="modal fade" id="modal_tambah_role_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Role Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form class="user" action="{{ route('private.users.role_users.tambah') }}"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <input name="nama_role" type="text" value="{{ old('nama_role') }}"
                                class="form-control  @error('nama_role') is-invalid @enderror" id="nama_role"
                                placeholder="Masukan nama Role">
                            @error('nama_role')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi_role" id="deskripsi_role" cols="30" rows="10"
                                class="form-control  @error('deskripsi_role') is-invalid @enderror">{{ old('deskripsi_role') }}</textarea>
                            @error('deskripsi_role')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block my-1">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Role User -->
<div class="modal fade" id="modal_detail_role" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">??</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal tambah data bank --}}
<div class="modal fade" id="modal_tambah_bank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah data bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form class="user" action="{{ route('private.data_bank.tambah') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input name="nama_bank" type="text" value="{{ old('nama_bank') }}"
                                class="form-control  @error('nama_bank') is-invalid @enderror" id="nama_bank"
                                placeholder="Nama bank">
                            @error('nama_bank')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="alamat_bank" type="text" value="{{ old('alamat_bank') }}"
                                class="form-control  @error('alamat_bank') is-invalid @enderror" id="alamat_bank"
                                placeholder="Alamat bank">
                            @error('alamat_bank')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="contact_bank" type="text" value="{{ old('contact_bank') }}"
                                class="form-control  @error('contact_bank') is-invalid @enderror" id="contact_bank"
                                placeholder="Contact bank">
                            @error('contact_bank')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="link_maps_bank" type="text" value="{{ old('link_maps_bank') }}"
                                class="form-control  @error('link_maps_bank') is-invalid @enderror" id="link_maps_bank"
                                placeholder="Link maps bank">
                            @error('link_maps_bank')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="logo_bank" type="file" value="{{ old('logo_bank') }}"
                                class="form-control  @error('logo_bank') is-invalid @enderror" id="logo_bank"
                                placeholder="Logo bank">
                            @error('logo_bank')
                                <span class="invalid-feedback">
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block my-1">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
