@extends('public.penjual.layouts.master')
@section('title')
    Jual Tanah
@endsection

@section('content')
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-12 px-md-5 py-5">
                        <form action="{{ route('penjual.data_tanah.jual_store') }}" class="p-5 bg-white" method="POST">
                            @csrf
                            <h2 class="h4 text-black mb-5">Masukan Data Tanah Dijual</h2>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="jenis_surat">Jenis Surat</label>
                                    <select class="form-control" name="jenis_surat" id="bantuan_input">
                                        <option value="">Select</option>
                                        @foreach ($jenis_surat as $jenis)
                                            <option value="{{ $jenis->id }}"
                                                title="{{ $jenis->keterangan_jenis_surat }}">
                                                {{ $jenis->nama_jenis_surat }}</option>
                                        @endforeach
                                    </select>
                                    @error('jenis_surat')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="nomor_sertifikat">Nomor Surat</label>
                                    <input type="text" id="nomor_sertifikat" value="{{ old('nomor_sertifikat') }}"
                                        name="nomor_sertifikat" class="form-control">
                                    @error('nomor_sertifikat')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="nama_pemilik">Nama pemilik</label>
                                    <input type="text" value="{{ old('nama_pemilik') }}" id="nama_pemilik"
                                        name="nama_pemilik" class="form-control">
                                    @error('nama_pemilik')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="luas_tanah">Luas Tanah (Satuan 'Hektar')</label>
                                    <input type="number" id="luas_tanah" value="{{ old('luas_tanah') }}" name="luas_tanah"
                                        class="form-control" id="bantuan_input" title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;">
                                    @error('luas_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="fasilitas_tanah">Fasilitas Tanah</label>
                                    <select name="fasilitas_tanah" id="fasilitas_tanah" class="form-control">
                                        <option value="">== Select fasilitas_tanah ==</option>
                                        <option value="TANAH_KOSONG">TANAH KOSONG</option>
                                        <option value="TANAH_DAN_RUMAH">TANAH DAN RUMAH</option>
                                    </select>
                                    @error('fasilitas_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="status_tanah">Status tanah dijual</label>
                                    <select name="status_tanah" id="status_tanah" class="form-control">
                                        <option value="">== Select status tanah ==</option>
                                        <option value="HANYA_JUAL">HANYA JUAL</option>
                                        <option value="BISA_BOOKING">BISA DIBOOKING</option>
                                    </select>
                                    @error('status_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="harga_tanah">Harga Tanah</label>
                                    <input class="form-control" value="{{ old('harga_tanah') }}" type="text"
                                        name="harga_tanah" id="harga_tanah">
                                    @error('harga_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="harga_booking_tanah">Harga booking</label>
                                    <input class="form-control" value="{{ old('harga_booking_tanah') }}" type="text"
                                        name="harga_booking_tanah" id="harga_booking_tanah">
                                    @error('harga_booking_tanah')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <h4>Alamat</h4>
                            <p>Alamat yang didukung saat ini hanya di Kabupaten Kampar, Provinsi Riau</p>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="provinsi">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control">
                                        <option value="">== Select provinsi ==</option>
                                        @foreach ($provinsi as $id => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('provinsi')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="kabupaten">Kabupaten / Kota</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="">== Select kabupaten ==</option>
                                        @foreach ($kabupaten as $id => $name)
                                            <option value="{{ $name }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kabupaten')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="districts">Kecamatan</label>
                                    <select name="districts" id="districts" class="form-control">
                                        <option value="">== Select Districts ==</option>
                                        @foreach ($districts as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('districts')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="villages">Desa</label>
                                    <select name="villages" id="villages" class="form-control">
                                        <option value="">== Select Villages ==</option>
                                    </select>
                                    @error('villages')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="nama_jln">Nama jalan</label>
                                    <input value="{{ old('nama_jln') }}" type="text" id="nama_jln" name="nama_jln"
                                        class="form-control">
                                    <span>Masukan nama jalan yang jelas</span>
                                    @error('nama_jln')
                                        <span class="invalid-feedback">
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="deskripsi_tanah" id="deskripsi_tanah" cols="30" rows="7"
                                    class="form-control"
                                    placeholder="Masukan deksipsi penjualan tanah, buat dengan kata kata menjual yang baik dan tepat, agar iklan anda menarik.">{{ old('deskripsi_tanah') }}</textarea><small>Note
                                    : Deskripsi ini akan dijadikan nama iklan tanah anda</small>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary btn-md text-black-50">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#districts').on('change', function() {
                axios.post('{{ route('penjual.data_tanah.jual.store') }}', {
                        id: $(this).val()
                    })
                    .then(function(response) {
                        $('#villages').empty();

                        $.each(response.data, function(id, name) {
                            $('#villages').append(new Option(name, id))
                        })
                    });
            });
        });

    </script>
@endpush
