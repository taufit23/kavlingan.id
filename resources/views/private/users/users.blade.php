@extends('private.layouts.master')
@section('title')
    Users
@endsection

@section('content')
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No KTP</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>No KTP</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data_user as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td><a
                                            href="{{ route('private.users.detail_pengguna', [$user->id]) }}">{{ $user->no_ktp }}</a>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                <td class=" @if ($user->status == 0) text-danger @else
                                        text-primary @endif">
                                        @if ($user->status == 0)
                                            Belum Aktif

                                        @else

                                            Aktif

                                        @endif
                                    </td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
