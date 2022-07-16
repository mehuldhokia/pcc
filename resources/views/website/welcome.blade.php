@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <div id="index">
        <div class="modal fade" id="myModal">
            <div class="modal_container">
                <a class="close" data-dismiss="modal">X</a>
                <h3>
                    Welcome to
                </h3>
                <img src="{{ asset('assets/images/logo_big.svg') }}" />
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- HOME SLIDER -->
    <section class="slide" style="background-image: url({{ asset('assets/images/homeslider/bg.jpg') }})">
        <div class="container">
            <div class="slide-cn" id="slide-home">
                <!-- SLIDE ITEM -->
                <div class="slide-item">
                    <div class="item-inner">
                        <div class="text">
                            <h2>PCC Foundation</h2>
                            <p>Registration by Goverment of India Ministry World Standardization Certified
                                Organisation <br /> WSC - Reg. No. 6012018013 - London</p>
                        </div>
                        <div class="img">
                            <img src="{{ asset('assets/images/homeslider/CImage3.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <!-- SLIDE ITEM -->
                {{-- @foreach ($carousel as $slide) --}}
                <div class="slide-item">
                    <div class="item-inner">
                        <div class="text">
                            {{-- <h2>{{ $slide->title }}</h2> --}}
                            {{-- <p>{{ $slide->description }}</p> --}}
                        </div>
                        <div class="img">
                            <img src="{{ asset('assets/images/homeslider/CImage1.png') }}" alt="">
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </section>
    <!-- END / HOME SLIDER -->

    <!-- AFTER SLIDER -->
    <section id="after-slider" class="after-slider section">
        <div class="awe-color bg-color-1"></div>
        <div class="after-slider-bg-2"></div>
        <div class="container">
            <div class="after-slider-content tb">
                <div class="inner tb-cell">
                    <h4>Find your course</h4>
                    <div class="course-keyword">
                        <input type="text" id="txtCourse" name="txtCourse" placeholder="Course keyword">
                    </div>
                </div>
                <div class="tb-cell text-right">
                    <a class="form-actions">
                        <a href="{{ route('website.courses') }}" id="btnSubmit" name="submit" class="mc-btn btn-style-1 abc">Find Course</a>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- END / AFTER SLIDER -->

    <!-- SECTION 1 -->
    <section id="mc-section-1" class="mc-section-1 section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="mc-section-1-content-1">
                        <h2 class="big">We designed our Online And Offline Best Courses for you</h2>
                        <p class="mc-text">
                            Our Foundation have good facilated system and the best area near bus stand in Veraval
                            City.
                            If You interested to know about Computer Education, so contact us & Follow us.
                        </p>
                        <a href="" class="mc-btn btn-style-1">Contact us</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-offset-1">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="featured-item">
                                <i class="icon icon-featured-1"></i>
                                <h4 class="title-box text-uppercase">Why Computer Education ?</h4>
                                <p>Now a days computer education is the basic requirment for the entire world. This
                                    is the new form which connect us to the world.</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="featured-item">
                                <i class="icon icon-featured-2"></i>
                                <h4 class="title-box text-uppercase">Our Aim</h4>
                                <p>We wanted to help the students who goodly need Education for Job or any basic
                                    information for their future.</p>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="featured-item">
                                <i class="icon icon-featured-3"></i>
                                <h4 class="title-box text-uppercase">Why PCC Foundation ?</h4>
                                <ul class="list list_index">
                                    <li>
                                        <p>We have best teachers.</p>
                                    </li>
                                    <li>
                                        <p>We Provide the best Computer Education in Veraval.</p>
                                    </li>
                                    <li>
                                        <p>Ac. Class Rooms</p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="featured-item">
                                <i class="icon icon-featured-4"></i>
                                <h4 class="title-box text-uppercase">Help to Poor students.</h4>
                                <p>We also provide Free Courses for Poor students from near by village for come out
                                    from indigence and make batter future.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / SECTION 1 -->

    <!-- SECTION 2 -->
    <section id="mc-section-2" class="mc-section-2 section">
        <div class="awe-parallax bg-section1-demo"></div>
        <div class="overlay-color-1"></div>
        <div class="container">
            <div class="section-2-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="ct">
                            <h2 class="big">Learning with Earning online is easier than ever before</h2>
                            <p class="mc-text">Our foundation provides you not only computer education, but also
                                give you earning scope. You can earn with your education by using our refferel
                                system.</p>
                            <a href="" class="mc-btn btn-style-3">See how it work</a>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="image">
                            <img src="{{ asset('assets/images/image.png') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END / SECTION 2 -->

    <!-- SECTION 3 -->
    <section id="mc-section-3" class="mc-section-3 section">
        <div class="container">
            <!-- FEATURE -->
            <div class="feature-course">
                <h4 class="title-box text-uppercase">FEATURE COURSE</h4>
                <a href="{{ route('website.courses') }}" class="all-course mc-btn btn-style-1">View all</a>
                <div class="row">
                    <div class="feature-slider owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper"
                                style="width: 7200px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-1800px, 0px, 0px);">
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/english_typing.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="English Typing master">English Typing
                                                    master</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                1000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/gujarati_typing.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Gujarati Typing">Gujarati Typing</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                1000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/office.jpg') }}" alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Certificate in MS Office">Certificate in MS
                                                    Office</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                2500/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/dtp.jpg') }}" alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Certificate in Desk Top Publishing">Certificate
                                                    in Desk Top Publishing</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                4000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/tally.jpg') }}" alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Tally ERP-9">Tally ERP-9</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                4000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/ccc.jpg') }}" alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Certificate in Computer Concept">Certificate
                                                    in Computer Concept</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                3500/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/c_programe.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Certificate in ‘C’ Programming">Certificate
                                                    in ‘C’ Programming</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                5000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/fundamental_application_kids.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Certificate Course on Fundamental Application (Kids)">Certificate
                                                    Course on Fundamental Application (Kids)</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                3000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/computer_teacher.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Diploma In Computer Teacher Course">Diploma
                                                    In Computer Teacher Course</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                12000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/diploma_course_in_computer_application.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Diploma Course in Computer Application">Diploma
                                                    Course in Computer Application</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                10000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/pgdca.jpg') }}" alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Post Graduate Diploma in Computer Application">Post
                                                    Graduate Diploma in Computer Application</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                12500/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 300px;">
                                    <div class="mc-item mc-item-1">
                                        <div class="image-heading">
                                            <img src="{{ asset('assets/images/course/computer_science.jpg') }}"
                                                alt="">
                                        </div>
                                        <div class="content-item">
                                            <h4>
                                                <a href="{{ route('website.course_details') }}" class="text_Limit" data-toggle="tooltip"
                                                    data-placement="top" title=""
                                                    data-original-title="Diploma in Computer Science">Diploma in
                                                    Computer Science</a>
                                            </h4>
                                        </div>
                                        <div class="ft-item">
                                            <a href="{{ route('website.course_details') }}" class="mc-btn btn-style-1">View Cource</a>
                                            <div class="price price_index">
                                                12000/-
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="owl-controls clickable">
                            <div class="owl-buttons">
                                <div class="owl-prev"><i class="fa fa-angle-left"></i></div>
                                <div class="owl-next"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END / FEATURE -->
        </div>
    </section>
    <!-- END / SECTION 3 -->
@endsection

@section('js')
@endsection
