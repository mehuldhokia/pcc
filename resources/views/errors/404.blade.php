@extends('layouts.appauth')

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
                        <form class="row g-1 p-3 p-md-4">
                            <div class="col-12 text-center mb-4">
                                <img src="{{ asset('dist/assets/images/not_found.svg') }}" class="w240 mb-4"
                                    alt="" />
                                <h5>OOP! PAGE NOT FOUND</h5>
                                <span class="">Sorry, the page you're looking for doesn't exist. if you think
                                    something is broken, report a problem.</span>
                            </div>
                            <div class="col-12 text-center">
                                {{-- {{ route('home') }} --}}
                                <a href="{{ route('website.root') }}" title=""
                                    class="btn btn-lg btn-block btn-light lift text-uppercase">Back to Home</a>
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
