@extends('website.layouts.app')

@section('header')
    <script src="{{ asset('assets/styles/scripts/student_verification.js') }}"></script>
@endsection

@section('content')
    <!-- SUB BANNER -->
    <section class="sub-banner section">
        <div class="awe-parallax bg-profile-feature"></div>
        <div class="awe-overlay overlay-color-3"></div>
        <div class="container">
            <div class="sub-banner-content">
                <h2 class="big">Student Verification</h2>
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
    <section class="categories-content pt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>Please Enter Student Enrollment Number</h2>
                </div>
                <div class="col-md-12">
                    <div class="content grid">
                        <div>
                            <form>
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="form-yourname">
                                        <input type="text" id="txtCertificate" placeholder="Enrollment Number" required>
                                    </div>
                                </div>
                                <div class="col-md-2 col-md-offset-5">
                                    <div class="form-submit-1">
                                        <input type="button" id="btnSubmit" value="Submit" class="mc-btn btn-style-1">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-6 bg-color-2 pt-50 pb-50 display_None col-md-offset-3 ">
                                <div class="col-md-12">
                                    <table class="table table-s0triped tblstudentverification mb-0">
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12 text-center bg-color-2 pt-50 pb-50 NotFoundDiv" style="display:none">
                                <img src="Images/no-records.png" />
                            </div> -->
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
