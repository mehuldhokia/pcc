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

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="col-12 text-center mb-5">
                                <img src="{{ asset('dist/assets/images/forgot-password.svg') }}" class="w240 mb-4" alt="" />
                                <h1>Forgot password?</h1>
                                <span>Enter the email address you used when you joined and we'll send you instructions to reset your password.</span>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="name@example.com" value="{{ old('email') }}" required
                                        autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                {{-- <a href="home" class="btn btn-lg btn-block btn-light lift text-uppercase"
                                    atl="signin">SIGN IN</a> --}}
                                <button type="submit" class="btn btn-lg btn-block btn-primary lift text-uppercase"
                                    atl="forget_password">{{ __('Submit') }}</button>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <span class="text-muted"><a href="{{ route('login') }}" class="text-warning">Back to Sign in</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- End Row -->

        </div>
    </div>
@endsection

@section('js')
@endsection
