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
                        <form class="row g-1 p-3 p-md-4" method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            @include('messages')

                            <div class="col-12 text-center mb-5">
                                <img src="{{ asset('dist/assets/images/verify.svg') }}" class="w240 mb-4" alt="" />
                                <h1>{{ __('Verify Your Email Address') }}</h1>
                                <span>.</span>
                            </div>

                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},


                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-lg btn-block btn-primary lift text-uppercase"
                                    alt="requestanother">{{ __('click here to request another') }}</button>.
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
