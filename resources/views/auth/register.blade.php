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
                        <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('register') }}">
                            @csrf

                            @include('messages')

                            <div class="col-12 text-center mb-3">
                                <h2>Create your account</h2>
                                <span>Free access to our dashboard.</span>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Your Full Name" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="number" id="phone" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number"
                                        required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" id="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="name@example.com" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="6+ characters required">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="confirm_password" class="form-label">Confirm password</label>
                                    <input type="password" name="confirm_password"
                                        class="form-control @error('confirm_password') is-invalid @enderror"
                                        placeholder="6+ characters required">
                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        I accept the <a href="#" title="Terms and Conditions"
                                            class="text-warning">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                {{-- <a href="auth-signin" class="btn btn-lg btn-block btn-primary lift text-uppercase"
                                    alt="SIGNUP">SIGN UP</a> --}}
                                <button type="submit" class="btn btn-lg btn-block btn-primary lift text-uppercase"
                                    atl="signup">SIGN UP</button>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <span>Already have an account? <a href="{{ route('login') }}" title="Sign in"
                                        class="text-warning">Sign in here</a></span>
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
