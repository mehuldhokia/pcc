@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- LOGIN -->
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">

                <!-- FORM
                {{-- @using (Html.BeginForm("Login", "Home", FormMethod.Post)) --}}
                { -->
                <fieldset>
                    {{-- <!-- @Html.AntiForgeryToken() --> --}}
                    <div class="col-xs-12 col-lg-4 pull-right">
                        <div class="form-login" style="border-radius: 10px;">
                            <h2 class="text-uppercase">sign in</h2>
                            <!-- @*<h6 style="color:red;font-weight:bold;">@Html.ValidationSummary(true)</h6>*@ -->

                            <div class="form-email">
                                <input type="text" placeholder="Email or Mobile" name="EmailOrMobile" required>

                            </div>
                            <div class="form-password">
                                <input type="password" name="Password" placeholder="Password" required>

                            </div>

                            {{-- <!-- @Html.ValidationSummary(true, "", new { @class = "text-danger" }) --}}
                            {{-- @if (ViewBag . Message != null) --}}
                            {{-- { --}}
                                {{-- <div class="alert alert-warning" style="margin-top: 20px; background: red; color: white; padding: 10px;"> --}}
                                    {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> --}}
                                    {{-- @ViewBag.Message --}}
                                {{-- </div> --}}
                            {{-- } --> --}}

                            <div class="form-check">
                                <a href="">
                                    <i class="fa fa-question-circle-o" style="margin-right:10px;font-size: 18px;"></i>Forget
                                    password?
                                </a>
                            </div>
                            <div class="form-submit-1">
                                {{-- <input type="submit" id="btnSubmit" value="Sign In" class="mc-btn btn-style-1"> --}}
                                <a href="{{ route('studpanel.dashboard') }}" class="mc-btn btn-style-1">Sign In</a>
                            </div>
                            <div class="link">
                                <a href="{{ route('website.registerpage') }}">
                                    <i class="icon md-arrow-right"></i>Don’t have account yet ? Join Us
                                </a>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- END / FORM -->
                <div class="image">
                    <img src="{{ asset('assets/images/homeslider/img-thumb.png') }}" alt="">
                </div>

            </div>
        </div>
    </section>
    <!-- END / LOGIN -->
@endsection

@section('js')
@endsection
