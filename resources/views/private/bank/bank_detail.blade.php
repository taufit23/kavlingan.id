@extends('private.layouts.master')
@section('title')
    Data bank {{ $bank->nama_bank }}
@endsection

@section('content')
    <div class="container-fluid">
        @include('vendor.flash_message')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Logo bank</div>
                    <div class="card-body text-center">
                        <a href="{{ $bank->logo_bank }}" target="blank">
                            <img class="img-account-profile img-fluid img-thumbnail mb-2" src="{{ $bank->logo_bank }}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <table class="table table-light table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-light">Nama Bank : </th>
                                <td class="bg-gradient-light text-primary">{{ $bank->nama_bank }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Alamat bank :</th>
                                <td class="bg-gradient-light text-primary">{{ $bank->alamat_bank }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Contact bank: </th>
                                <td class="bg-gradient-light text-primary">{{ $bank->contact_bank }}</td>
                            </tr>
                            <tr>
                                <th class="text-light">Link masps bank: </th>
                                <td class="bg-gradient-light text-primary"><a href="{{ $bank->link_maps_bank }}"
                                        class="btn btn-sm btn-outline-info" target="blank">{{ $bank->nama_bank }}</a></td>
                            </tr>

                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>
@stop
