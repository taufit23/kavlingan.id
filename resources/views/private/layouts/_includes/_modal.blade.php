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

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
