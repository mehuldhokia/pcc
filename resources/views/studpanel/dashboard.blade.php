@extends('studpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- COURSE CONCERN -->
    <section id="course-concern" class="course-concern">
        <div class="container">
            <div class="row">

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.profile') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-id-card"></i>
                            <h4>My Profile</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.mycourses') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-book"></i>
                            <h4>My Course</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.upload_receipt') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-cloud-upload"></i>
                            <h4>Upload Receipt</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.quiz') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-question-circle"></i>
                            <h4>GK Quiz</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.myreferral') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-handshake-o"></i>
                            <h4>My Referral</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.myearnings') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-rupee"></i>
                            <h4>My Earning</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('studpanel.change_password') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-key"></i>
                            <h4>Change Password</h4>
                        </div>
                    </a>
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3">
                    <a href="{{ route('website.loginpage') }}">
                        <div class=" mc-item student_icon">
                            <i class="dashboard_icon fa fa-power-off"></i>
                            <h4>Log Out</h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>
    <!-- END / COURSE CONCERN -->
@endsection

@section('js')
@endsection
