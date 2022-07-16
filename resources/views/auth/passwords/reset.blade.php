@extends('admin.layouts.appauth')

@section('header')
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex p-0 p-xl-5">
        <div class="container-xxl">
            <div class="row g-0">
                <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                    <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                        <div class="text-center m-4">
                            <img src="{{ asset('assets/images/logo_big2.svg') }}" class="w280 m-2" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                    <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">

                        <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('password.update') }}">
                            @csrf

                            @include('messages')

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="col-12 text-center mb-5">
                                {{-- <img src="{{ asset('dist/assets/images/verify.svg') }}" class="w240 mb-4"
                                    alt="" /> --}}
                                <h1>Reset Password</h1>
                                <span>Enter new password below to access our services.</span>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                                        placeholder="name@example.com">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="6+ characters required">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('Confirm Password') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="6+ characters required">

                                </div>
                            </div>

                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-lg btn-block btn-primary lift text-uppercase">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <span>Haven't received email? <a href="{{ route('password.request') }}"
                                        class="text-warning">Resend it.</a></span>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- End Row -->

        </div>
    </div>
@endsection
