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
                <h2 class="big">Our Courses</h2>
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
    <section id="categories-content" class="categories-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content grid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/computer_science.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="Diploma in Computer Science">
                                                Diploma in Computer Science</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            12000/-
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/pgdca.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Post Graduate Diploma in Computer Application">
                                                Post Graduate Diploma in Computer Application</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            12500/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/diploma_course_in_computer_application.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Diploma Course in Computer Application">
                                                Diploma Course in Computer Application</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            10000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/computer_teacher.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Diploma in Computer Teacher Course">
                                                Diploma in Computer Teacher Course</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            12000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/fundamental_application_kids.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                       Certificate Course on Fundamental Application (Kids)">
                                                Certificate Course on Fundamental Application (Kids)</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            3000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/c_programe.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Certificate in ‘C’ Programming">
                                                Certificate in ‘C’ Programming</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            5000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/ccc.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        DCertificate in Computer Concept">
                                                Certificate in Computer Concept</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            3500/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/tally.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Tally ERP-9">
                                                Tally ERP-9</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            4000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/dtp.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Certificate in Desk Top Publishing">
                                                Certificate in Desk Top Publishing</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            4000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/office.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Certificate in MS Office">
                                                Certificate in MS Office</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            2500/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/gujarati_typing.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        Gujarati Typing">
                                                Gujarati Typing</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            1000/-
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="mc-item mc-item-1">
                                    <div class="image-heading">
                                        <img src="{{ asset('assets/images/course/english_typing.jpg') }}">
                                    </div>
                                    <div class="content-item">
                                        <h4><a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                data-placement="top"
                                                title="
                                        English Typing master">
                                                English Typing master</a></h4>
                                    </div>
                                    <div class="ft-item">
                                        <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Course</a>
                                        <div class="price price_index">
                                            1000/-
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CATEGORIES CONTENT -->
@endsection

@section('js')
@endsection
