@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- SUB BANNER -->
    <div class="form-checkout" style="top: 0px; display: block;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form>
                        <ul id="bar">
                            <li class="active">How to Purchase This Course</li>
                        </ul>
                        <span class="closeForm"><i class="icon md-close-1"></i></span>
                        <div class="form-body">
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-1">
                                            <div class="mc-item mc-item-2">
                                                <div class="image-heading">
                                                    <img src="{{ asset('assets/images/course/c_programe.jpg') }}"
                                                        alt="">
                                                </div>

                                                <div class="content-item">

                                                    <h4 class=""><a href="{{ route('website.course_intro') }}">Post Graduate Diploma in
                                                            Computer Application</a></h4>
                                                </div>
                                                <div class="ft-item">
                                                    <div class="price1">
                                                        Rs. 12000/-
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-2">
                                            <p>Deposit this course amount in our bank account using bank details given below
                                                or Google Pay or Phone Pay. Then upload payment receipt in your profile with
                                                proper selection of your purchased course detail.</p>

                                            <h3 class="fs-title">Bank Details :</h3>
                                            <table class="table table-striped mb-0">
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
                                                        <td>PUNJAB &amp; SIND BANK VERAVAL BRANCH</td>
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
                                            <div class="row course_purchase">
                                                <div class="col-md-3">
                                                    <div class="text-center">
                                                        <h5>G. Pay 1</h5>
                                                        {{-- <img src="Images/qrcodes/googlePay.jpg"> --}}
                                                        <img src="{{ asset('assets/images/qrcodes/google_pay.jpg') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="text-center">
                                                        <h5>G. Pay 2</h5>
                                                        {{-- <img src="Images/qrcodes/googlePay2.jpg"> --}}
                                                        <img src="{{ asset('assets/images/qrcodes/google_pay2.jpg') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="text-center">
                                                        <h5>Phone Pay 1</h5>
                                                        {{-- <img src="Images/qrcodes/phonePay.jpg"> --}}
                                                        <img src="{{ asset('assets/images/qrcodes/phone_pay.jpg') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class=" text-center">
                                                        <h5>Phone Pay 2</h5>
                                                        {{-- <img src="Images/qrcodes/phonePay2.jpg"> --}}
                                                        <img src="{{ asset('assets/images/qrcodes/phone_pay2.jpg') }}" />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    <!-- END / HEADER -->
    <section class="course-top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="sidebar-course-intro">
                        <div class="video-course-intro">
                            <div class="inner">
                                <div class="video-place">
                                    <div class="img-thumb">
                                        <img src="{{ asset('assets/images/course/dtp.jpg') }}">
                                    </div>
                                </div>
                                <div class="video embed-responsive embed-responsive-16by9">
                                    <img src="{{ asset('assets/images/course/dtp.jpg') }}">
                                </div>
                            </div>
                            <div class="price">
                                4000/-
                            </div>
                            <input type="submit" id="btnBuy" class="take-this-course mc-btn btn-style-1"
                                style="float:right" value="Take this course">
                        </div>

                        <div class="new-course">
                            <div class="item course-code">
                                <i class="icon md-barcode"></i>
                                <h4>Course Code</h4>
                                <p class="detail-course">#CDTP</p>
                            </div>
                            <div class="item course-code">
                                <i class="icon md-time"></i>
                                <h4>Duration</h4>
                                <p class="detail-course">2.5 Month</p>
                            </div>
                            <div class="item course-code">
                                <i class="icon md-img-check"></i>
                                <h4>Qualification</h4>
                                <p class="detail-course">5th Pass</p>
                            </div>
                        </div>
                        <hr class="line">

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="">
                        <!-- Tab panes -->
                        <div class="">
                            <!-- INTRODUCTION -->
                            <div class="course_details">
                                <ul class="list-disc">
                                    <li>
                                        <p>Computer Fundamental</p>
                                    </li>
                                    <li>
                                        <p>Windows Operating System</p>
                                    </li>
                                    <li>
                                        <p>DTP Course</p>
                                    </li>
                                    <li>
                                        <p>PageMaker</p>
                                    </li>
                                    <li>
                                        <p>CoreIDRAW-11</p>
                                    </li>
                                    <li>
                                        <p>Flash</p>
                                    </li>
                                </ul>
                            </div>
                            <!-- END / INTRODUCTION -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
