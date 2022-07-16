@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- SUB BANNER -->
    <section class="sub-banner section">
        <div class="awe-parallax bg-profile-feature"></div>
        <div class="awe-overlay overlay-color-3"></div>
        <div class="container">
            <div class="sub-banner-content">
                <h2 class="big">
                    Certificates Samples
                </h2>
            </div>
        </div>
    </section>
    <!-- END / SUB BANNER -->
    <!-- PAGE CONTROL -->
    <section class="page-control">
        <div class="container">
            <div class="page-info">
                <a href="{{ route('website.root') }}"><i class="icon md-arrow-left"></i>Back to home</a>
            </div>
        </div>
    </section>
    <!-- END / PAGE CONTROL -->

    <section class="blog">
        <div class="container">
            <div class="row certificate">
                <div class="col-md-6">
                    <h4>Certificate of Incorporation</h4>
                    <img src="{{ asset('assets/images/certificates/01.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>Certificate of Incorporation</h4>
                    <img src="{{ asset('assets/images/certificates/03.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>Indo-UK Cuturla Forum</h4>
                    <img src="{{ asset('assets/images/certificates/02.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>World Record Star 2020</h4>
                    <img src="{{ asset('assets/images/certificates/04.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>South Asian Chamber of Commerce & Industry</h4>
                    <img src="{{ asset('assets/images/certificates/05.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>South Asian Chamber of Commerce & Industry</h4>
                    <img src="{{ asset('assets/images/certificates/06.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>World Standardization Certification</h4>
                    <img src="{{ asset('assets/images/certificates/07.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>World Book of Records</h4>
                    <img src="{{ asset('assets/images/certificates/08.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>Trust Registration</h4>
                    <img src="{{ asset('assets/images/certificates/09.jpg') }}" />
                </div>
                <div class="col-md-6">
                    <h4>Trust Registration</h4>
                    <img src="{{ asset('assets/images/certificates/10.jpg') }}" />
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
