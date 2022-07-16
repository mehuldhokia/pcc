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
                    Director Desk
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
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="avatar-acount">
                        <div class="changes-avatar">
                            <div class="img-acount">
                                <img src="{{ asset('assets/images/shaileshBarad.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="info-acount director text-justify">
                            <h3 class="md black bold">Shailesh K. Barad</h3>
                            <div class="profile-email-address">
                                <div class="profile-email" style="display:block;">
                                    <h5>MEMBER OF ZRUCC,</h5><br />
                                    <p>
                                        Ministry of Railways Govt. of India.
                                    </p>
                                </div>
                                <div class="profile-email" style="display:block;">
                                    <h5>PRESIDENT,</h5><br />
                                    <p>World Book Of Records, UK, Saurashtra-Kutch & Diu.</p><br />
                                </div>
                                <div class="profile-email" style="display:block;">
                                    <h5>VICE-PRESIDENT,</h5><br />
                                    <p>South Asian Chamber of Commerce and Industry Gujarat.</p>
                                </div>
                                <div class="profile-email" style="display:block;">
                                    <h5>DIRECTOR,</h5>
                                    <p>&nbsp;&nbsp;PCC FOUNDATION</p>
                                </div>
                            </div>
                            <p>Dear Students,</p>
                            <p>I Heartly Welcome you to the PCC Foundation Training Institute. The top learning system is a
                                unique and challenging mode of education offered at the computer education level.</p>
                            <p>This system provides golden opportunities for those who to have interesting to got computer
                                knowledge in institution education & also all the people which connecting with computer
                                knowledge. We provide access to high quality computer education to all those who seek it,
                                all level of age students and peoples which is connected with education or not connected
                                with education or region or formal qualification and other education qualification.</p>
                            <p>We are promoting and developing Information Technology and study center for practical
                                computer knowledge for all computer courses providing in GIR SOMNATH district in VERAVAL
                                taluka.</p>
                            <p>PCC Foundation institute also provide All Online courses of computer in all over GUJARAT.
                                This online courses through student getting many advantages.</p>
                            <p>I promised to all student to provide them good quality computer education in the Institute.
                                Our Institute in Computer lab & Theory lab& hardware lab are well equipped with all modern &
                                High-Tech equipments.</p>
                            <p>Our institution of higher learning must generate new knowledge & transforming dreams into
                                reality for our youth and all level of people which is using computer for work & knowledge.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-connect">
                        <h5>Social connect</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/pccfoundationindia/" target="_blank" class="facebook">
                                    <i class="icon fa fa-facebook"></i>
                                    <p>Facebook</p>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/pccfounda/" class="instagram" target="_blank">
                                    <i class="icon md-insta fa fa-instagram"></i>
                                    <p>Instagram</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / PROFILE -->

    <!-- END / SECTION 3 -->
@endsection

@section('js')
@endsection
