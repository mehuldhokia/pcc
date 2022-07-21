@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- LOGIN -->
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">

                <form id="LoginForm" method="post" action="{{ route('userprofile.loginsubmit') }}">
                    @csrf

                    @include('toastr')

                    <div class="col-xs-12 col-lg-4 pull-right">
                        <div class="form-login" style="border-radius: 10px;">
                            <h2 class="text-uppercase">sign in</h2>

                            <div class="form-email">
                                <label style="color: white; top: 15px; position: relative; margin:0px; padding: 0px;">Email
                                    Address</label>
                                <input id="email" type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-password">
                                <label
                                    style="color: white; top: 15px; position: relative; margin:0px; padding: 0px;">Password</label>
                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="**********"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-check">
                                <a href="">
                                    <i class="fa fa-question-circle-o" style="margin-right:10px;font-size: 18px;"></i>Forget
                                    password?
                                </a>
                            </div>
                            <div class="form-submit-1">
                                <input type="submit" id="btnSubmit" value="Sign In" class="mc-btn btn-style-1">
                                {{-- <a href="{{ route('userpanel.dashboard') }}" class="mc-btn btn-style-1">Sign In</a> --}}
                            </div>
                            <div class="link">
                                <a href="{{ route('userprofile.registerpage') }}">
                                    <i class="icon md-arrow-right"></i>Don’t have account yet ? Join Us
                                </a>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- END / FORM -->
                <div class="image">
                    <img src="{{ asset('assets/images/homeslider/img-thumb.png') }}" alt="">
                </div>

            </div>
        </div>
    </section>
    <!-- END / LOGIN -->
@endsection

@section('js')
@endsection
