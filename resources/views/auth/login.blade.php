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
                        <!-- Form -->
                        <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('login') }}">
                            @csrf

                            @include('messages')

                            <div class="col-12 text-center mb-5">
                                <h1>Sign in</h1>
                                <span>Free access to our dashboard.</span>
                            </div>
                            <!-- <div class="col-12 text-center mb-4">
                                        <a class="btn btn-lg btn-light btn-block" href="#">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="avatar xs me-2" src="dist/assets/images/google.svg"
                                                    alt="Image Description">
                                                Sign in with Google
                                            </span>
                                        </a>
                                        <span class="dividers text-muted mt-4">OR</span>
                                    </div> -->
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Email address</label>
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
                            <div class="col-12">
                                <div class="mb-2">
                                    <div class="form-label">
                                        <span class="d-flex justify-content-between align-items-center">Password</span>
                                    </div>
                                    <input id="password" type="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="**********" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div align="right">
                                    @if (Route::has('password.request'))
                                        <a class="text-warning"
                                            href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                        id="remember flexCheckDefault" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember flexCheckDefault">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                {{-- <a href="home" class="btn btn-lg btn-block btn-light lift text-uppercase"
                                    atl="signin">SIGN IN</a> --}}
                                <button type="submit" class="btn btn-lg btn-block btn-primary lift text-uppercase"
                                    atl="signin">SIGN IN</button>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <span>Don't have an account yet? <a href="{{ route('register') }}"
                                        class="text-warning">Sign up here</a></span>
                            </div>
                        </form>
                        <!-- End Form -->

                    </div>
                </div>
            </div> <!-- End Row -->

        </div>
    </div>
@endsection

@section('js')
@endsection
