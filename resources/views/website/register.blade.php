@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- REGISTER -->
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">
                <!-- FORM -->
                <div class="col-lg-6 col-md-offset-3">
                    <div class="form-login" style="max-width:100%;border-radius: 10px;">

                        <h2 class="text-uppercase">sign up</h2>

                        <div class="form-email">
                            <input type="text" name="fullname" placeholder="Full Name"
                                class="form-control @error('fullname') is-invalid @enderror"
                                value="{{ old('fullname') }}">

                            <!-- @Html.TextBoxFor(m => m.FullName, new { @placeholder = "Full name" })
                                            @*@Html.TextBoxFor(m => m.LastName, new { @placeholder = "Last name" })*@
                                            @Html.ValidationMessageFor(m => m.FullName, "", new { @class = "text-danger" })
                                            @*@Html.ValidationMessageFor(m => m.LastName, "", new { @class = "text-danger" })*@ -->
                        </div>
                        <div class="form-email">
                            <!-- @Html.TextBoxFor(m => m.Email, new { @placeholder = "Your Mail" })
                                            @Html.ValidationMessageFor(m => m.Email, "", new { @class = "text-danger" }) -->
                            <input type="text" name="" placeholder="Your Mail" class="form-control">

                        </div>
                        <div class="form-email">
                            <input type="text" name="" placeholder="Your Mobile" class="form-control">
                            <!-- @Html.TextBoxFor(m => m.Mobile, new { @placeholder = "Your Mobile" })
                                            @Html.ValidationMessageFor(m => m.Mobile, "", new { @class = "text-danger" }) -->
                        </div>

                        <div class="form-email">
                            <input type="text" name="" placeholder="Your Whatsapp No." class="form-control">
                            <!-- @Html.TextBoxFor(m => m.WhatsappNo, new { @placeholder = "Your Whatsapp No." })
                                            @Html.ValidationMessageFor(m => m.WhatsappNo, "", new { @class = "text-danger" }) -->
                        </div>

                        <div class="form-question mc-select">
                            <select name="" id="" class="select">
                                <option>Gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            <!-- @Html.DropDownListFor(m => m.Gender, new List<SelectListItem>
                                            { new SelectListItem{Text="Male", Value="M"},
                                            new SelectListItem{Text="Female", Value="F"}}, "Gender", new { @class = "select" })
                                            @Html.ValidationMessageFor(m => m.Gender, "", new { @class = "text-danger" }) -->
                        </div>
                        <div class="form-email">
                            <input type="text" name="" id="" placeholder="DD/MM/YYYY"
                                class="form-control">
                            <!-- @Html.TextBoxFor(m => m.DOB, new { @placeholder = "DD/MM/YYYY" })
                                            @*@Html.TextBoxFor(model => model.DOB, new { @class = "form-control border-radius-4", placeholder = "DD/MM/YYYY", maxlength = "100" })
                       @Html.ValidationMessageFor(model => model.DOB) -->
                        </div>
                        <div class="form-email">
                            <!-- @Html.TextBoxFor(m => m.UAddress, new { @placeholder = "Your Address" })
                                            @Html.ValidationMessageFor(m => m.UAddress, "", new { @class = "text-danger" }) -->
                            <input type="text" name="" id="" placeholder="Your Address"
                                class="form-control">
                        </div>

                        <div class="form-email">
                            <!-- @Html.TextBoxFor(m => m.City, new { @placeholder = "Your City" })
                                            @Html.ValidationMessageFor(m => m.City, "", new { @class = "text-danger" }) -->
                            <input type="text" name="" id="" placeholder="Your City"
                                class="form-control">
                        </div>

                        <div class="form-question mc-select">
                            <select class="select" id="ddlStd" name="ddlStd">
                                <option value="">Please Select Qualification</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="B.Com">B.Com</option>
                                <option value="M.Com">M.Com</option>
                                <option value="BCA">BCA</option>
                                <option value="MCA">MCA</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-password">
                            <!-- @Html.PasswordFor(m => m.Password, new { @placeholder = "Your Password" })
                                            @Html.ValidationMessageFor(m => m.Password, "", new { @class = "text-danger" }) -->
                            <input type="password" name="" id="" placeholder="Your Password">
                        </div>

                        <div class="form-email">
                            <!-- @Html.TextBoxFor(m => m.ReferBy, new { @placeholder = "Referel", @readonly = "readonly" }) -->
                            <input type="text" name="" id="" placeholder="Referel" class="form-control"
                                readonly="readonly">
                        </div>

                        <div class="form-email">
                            <input type="file" value="Profile Picture" name="UserImage"
                                style="padding-top: 5px; height: 37px;" />
                            <!-- @Html.ValidationMessageFor(m => m.UserImage, "", new { @class = "text-danger" }) -->
                        </div>
                        <!-- @Html.HiddenFor(m => m.ReferCode)
                                        @Html.HiddenFor(m => m.IsActive)
                                        @*@Html.HiddenFor(m => m.IsValidate)*@
                                        @Html.HiddenFor(m => m.CreatedDate) -->
                        <div class="form-submit-1">
                            <input type="submit" value="Sign Up" class="mc-btn btn-style-1">
                        </div>
                        <div class="link">
                            <a href="{{ route('website.loginpage') }}">
                                <i class="icon md-arrow-right"></i>Already have account ? Log in
                            </a>
                        </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / REGISTER -->
@endsection

@section('js')
    <script src="styles/scripts/master.js"></script>
    <script src="styles/scripts/register.js"></script>
@endsection
