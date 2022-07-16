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
                <h2 class="big">About Us</h2>
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
    <!-- BLOG -->
    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="avatar-acount">
                        <div class="info-acount text-justify">
                            <h3 class="md black">
                                Welcome to PCC Foundation India
                            </h3>
                            <p>
                                PCC Foundation paves a path to early success in life through its fast track short duration
                                correspondence courses. These courses consist of concepts and case studies that provide
                                broad exposure to relevant business concepts and management specifics. This helps them to
                                get started as Managers by enhancing their productivity, capability to formulate business
                                policies, strategies and their implications for the organization.
                            </p>
                            <p>
                                Best IT Education Provide in Gujarat Region.
                            </p>
                            <p>
                                We are an Industry Certified Institute who dedicate ourselves towards excellent services of
                                the educational sector. We offer quality education to students from South and South-East
                                India. Apart from these, numerous applicants from all across the nation choose us for their
                                step towards a brighter career. Since our inception, for more than a decade, we have
                                achieved various milestones with complete perfection. We have a widespread campus and a
                                recruited team of competent, dedicated and highly qualified faculty. They are committed to
                                ensure well-trained graduates nurtured with unmatched skills and knowledge.
                            </p>
                            <p class="bold" style="font-style:italic">
                                PCC Foundation offers short duration programs which shall enable the students to acquire
                                world class management qualification that would enhance careers of students in the
                                management sector, the unique education methodology and the compact, integrated short term
                                correspondence courses shall be of great advantage to all those who look forward to achieve
                                early success in their life.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="social-connect">
                        <h5>Social connect</h5>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/pccfoundationindia/" class="facebook" target="_blank">
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
    <!-- END / BLOG -->
@endsection

@section('js')
@endsection
