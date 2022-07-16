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
                <h2 class="big">Donation</h2>
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
    <!-- CATEGORIES CONTENT -->
    <section class="profile pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center">
                    <div class="avatar-acount donation ">
                        <object type="application/pdf" data="{{ asset('assets/images/donation.pdf#toolbar=0') }}" />
                        <p>
                            Your web browser doesn't have a PDF plugin.
                        </p>
                        </object>
                        <a class="mc-btn btn-style-1" href="{{ asset('assets/images/donation.pdf') }}" target="_blank">click here to download the
                            PDF file.</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="social-connect padding20">
                        <h5>OUR BANK DETAIL</h5>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">Account Name</th>
                                    <td>:</td>
                                    <td>PRIYANSHI CAREER CENTER FOUNDATION</td>
                                </tr>
                                <tr>
                                    <th scope="row">Account Number</th>
                                    <td>:</td>
                                    <td>15521100000086</td>
                                </tr>
                                <tr>
                                    <th scope="row">BANK NAME</th>
                                    <td>:</td>
                                    <td>PUNJAB & SIND BANK VERAVAL BRANCH</td>
                                </tr>
                                <tr>
                                    <th scope="row">BRANCH NAME</th>
                                    <td>:</td>
                                    <td>VERAVAL</td>
                                </tr>
                                <tr>
                                    <th scope="row">IFSC CODE</th>
                                    <td>:</td>
                                    <td>
                                        PSIB0021552
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="social-connect padding20 text-center">
                        <h5>Google Pay 1</h5>
                        <img src="{{ asset('assets/images/qrcodes/google_pay.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="social-connect padding20 text-center">
                        <h5>Google Pay 2</h5>
                        <img src="{{ asset('assets/images/qrcodes/google_pay2.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="social-connect padding20 text-center">
                        <h5>Phone Pay 1</h5>
                        <img src="{{ asset('assets/images/qrcodes/phone_pay.jpg') }}" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="social-connect padding20 text-center">
                        <h5>Phone Pay 2</h5>
                        <img src="{{ asset('assets/images/qrcodes/phone_pay2.jpg') }}" />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
