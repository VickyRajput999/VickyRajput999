@extends('layout.app')

@section('content')
    <div class="login-box">
        <div class="container">
            <div class="outer_login">
                <div class="row  align-items-center">
                    <div class="col-md-6">
                        <div class="login-image text-center">
                            <img src='{{ asset('admin-assets/img/login-img.png') }}' class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-outline card-primary login_form">
                            <div class="card-header text-center">
                                <img src="{{ asset('admin-assets/img/logos/form-logo.png') }}" class="login_img d-block mx-auto"
                                    alt="">
                                <h2 href="#" class="form-heading">{{ __('User Login') }}</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf <!-- Use @csrf to echo the CSRF token -->

                                    <div class="input-group mb-3 login-input">
                                        <input type="number" value="{{ old('phone') }}"
                                            class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number"
                                            id="phone" name="phone">
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="input-group mb-3 login-input">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" id="password" name="password" autocomplete="off">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div class="forgot_password text-end">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>

                                    <div class="text-center pt-3">
                                        <button type="submit" class="btn_primary login">{{ __('Login') }}</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
