@extends('public.layouts.master')
@section('Login')

@endsection
@section('title')
    Login
@endsection
@section('content')
    <div class="site-section" id="login-section">
        <div class="container">
            <div class="row align-items-lg-center justify-content-center">
                <div class="col-md-6 mb-5 mb-lg-0 position-relative mt-4">
                    <div class="card">
                        <div class="card-header text-center">{{ __('Login') }}</div>

                        <div class="card-body">
                            @if (session('sucess'))
                                <div class="my-1 alert alert-success"
                                    style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                    role="alert">
                                    {{ session('sucess') }}
                                </div>
                            @endif
                            @if (session('errors'))
                                <div class="my-1 alert alert-danger"
                                    style="margin-top: 25px; margin-bottom: 0px; margin-left: 5px; margin-right: 5px; "
                                    role="alert">
                                    {{ session('errors') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Alamat email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Kata sandi') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class=" btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
