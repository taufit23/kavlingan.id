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
                        <form action="#" class="p-5 bg-white">

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
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="nomor_sertifikat">Nomor Surat</label>
                                    <input type="text" id="nomor_sertifikat" name="nomor_sertifikat" class="form-control">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="nama_pemilik">Nama pemilik</label>
                                    <input type="text" id="nama_pemilik" name="nama_pemilik" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="luas_tanah">Luas Tanah (Satuan 'Hektar')</label>
                                    <input type="number" id="luas_tanah" name="luas_tanah" class="form-control"
                                        id="bantuan_input" title="Satuan tidak perlu ditulis"
                                        style="input::-webkit-outer-spin-button; input::-webkit-inner-spin-button {-webkit-appearance: none; margin: 0;">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="province">Provinsi</label>
                                    <select name="province" id="province" class="form-control">
                                        <option value="">== Select Province ==</option>
                                        @foreach ($provinces as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="city">Kota</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="">== Select City ==</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <label class="text-black" for="district">Kecamatan / Kota</label>
                                    <select name="district" id="district" class="form-control">
                                        <option value="">== Select District ==</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black" for="city">Kota</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="">== Select City ==</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="text-black" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                        placeholder="Write your notes or questions here..."></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


    @endsection

    @push('scripts')
        <script>
            $(function() {
                $('#province').on('change', function() {
                    axios.post('{{ route('penjual.data_tanah.jual.store') }}', {
                            id: $(this).val()
                        })
                        .then(function(response) {
                            $('#city').empty();

                            $.each(response.data, function(id, name) {
                                $('#city').append(new Option(name, id))
                            })
                        });
                });
            });

        </script>
    @endpush
