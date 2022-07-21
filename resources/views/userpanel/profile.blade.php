@extends('userpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section class="profile">
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="avatar-acount">
                        <form action="#" class="form-horizontal" enctype="multipart/form-data" id="UserForm" method="post"
                            name="UserForm" role="form" novalidate="novalidate"><input name="__RequestVerificationToken"
                                type="hidden"
                                value="lMh_fuc00gx21Dyw_pEUxi-Z85KEqAz2wboV0lQVAN3vnciF-1eToF2FU1K5-aIJKWZpj1mCOlc1lneiITwIPjonTTKzKoIM-zP4URIRqxu0zLl-l4mG-YSYRN9cjFsq0">
                            <fieldset>


                                <div class="changes-avatar">

                                    <div class="img-acount" style="max-width: 150px;max-height: 150px;">
                                        <img src="{{ asset('assets/images/user_images/team-13.jpg') }}" alt="" id="UserImage"
                                            name="UserImage">
                                    </div>
                                    <div class="choses-file up-file text-center" style=" width: 100%;">
                                        <input type="file" value="Profile Picture" name="UserImage">
                                        <a href="#" class="mc-btn btn-style-1">Changes image</a>
                                    </div>
                                </div>
                                <div class="info-acount">


                                    <div class="security">
                                        <div class="tittle-security">
                                            <div class="width_50">
                                                <h5>Full Name</h5>

                                                <input data-val="true"
                                                    data-val-length="The field Full Name must be a string with a maximum length of 100."
                                                    data-val-length-max="100" data-val-regex="Enter only alphabets"
                                                    data-val-regex-pattern="^[A-Za-z ]+$"
                                                    data-val-required="The Full Name field is required." id="FullName"
                                                    name="FullName" placeholder="First name" type="text"
                                                    value="Sufiyan H Rathod">
                                                <span class="field-validation-valid text-danger" data-valmsg-for="FullName"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="width_50">
                                                <h5>Email</h5>
                                                <input data-val="true"
                                                    data-val-email="The Email field is not a valid e-mail address."
                                                    data-val-required="The Email field is required." id="Email"
                                                    name="Email" placeholder="Email" readonly="readonly" type="text"
                                                    value="sufiyan.rathod82@gmail.com">

                                            </div>
                                            <div class="width_50">
                                                <h5>Moible No.</h5>
                                                <input data-val="true" data-val-regex="Wrong Mobile No"
                                                    data-val-regex-pattern="^(\d{10})$"
                                                    data-val-required="The Mobile No field is required." id="Mobile"
                                                    name="Mobile" placeholder="Your Mobile" readonly="readonly"
                                                    type="text" value="9764852349">

                                            </div>
                                            <div class="width_50">
                                                <h5>Whatsapp No.</h5>
                                                <input data-val="true" data-val-regex="Wrong No"
                                                    data-val-regex-pattern="^(\d{10})$"
                                                    data-val-required="The Whatsapp No field is required." id="WhatsappNo"
                                                    name="WhatsappNo" placeholder="Your Whatsapp No." type="text"
                                                    value="9764852349">
                                                <span class="field-validation-valid text-danger"
                                                    data-valmsg-for="WhatsappNo" data-valmsg-replace="true"></span>

                                            </div>
                                            <div class="width_50">
                                                <h5>Gender</h5>
                                                <select class="select" data-val="true"
                                                    data-val-required="Gender is required." id="Gender" name="Gender">
                                                    <option value="">Gender</option>
                                                    <option selected="selected" value="M">Male</option>
                                                    <option value="F">Female</option>
                                                </select>
                                                <span class="field-validation-valid text-danger" data-valmsg-for="Gender"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="width_50">
                                                <h5>DOB</h5>
                                                <input id="DOB" name="DOB" placeholder="DD/MM/YYYY" type="text"
                                                    value="22-04-2022">
                                                <span class="field-validation-valid text-danger" data-valmsg-for="DOB"
                                                    data-valmsg-replace="true"></span>
                                            </div>
                                            <div class="width_50">
                                                <h5>Qualification</h5>
                                                <select class="form-control" id="ddlStd" name="ddlStd">
                                                    <option value="-1">Please Select Qualification</option>
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
                                                    <option value="13">B.Com</option>
                                                    <option value="14">M.Com</option>
                                                    <option value="15">BCA</option>
                                                    <option value="16">MCA</option>
                                                    <option value="17">Other</option>
                                                </select>
                                            </div>
                                            <input data-val="true"
                                                data-val-number="The field Qualificaton must be a number."
                                                data-val-required="Qualification is required." id="hfName"
                                                name="Qualificaton" type="hidden" value="">

                                            <div class="width_50">
                                                <h5>Address</h5>
                                                <input data-val="true"
                                                    data-val-length="The field Address must be a string with a maximum length of 100."
                                                    data-val-length-max="100"
                                                    data-val-required="The Address field is required." id="UAddress"
                                                    name="UAddress" placeholder="Your Address" type="text"
                                                    value="Dapodi">
                                                <span class="field-validation-valid text-danger"
                                                    data-valmsg-for="UAddress" data-valmsg-replace="true"></span>

                                            </div>
                                            <div class="width_50">
                                                <h5>City</h5>
                                                <input data-val="true"
                                                    data-val-length="The field City must be a string with a maximum length of 50."
                                                    data-val-length-max="50" data-val-regex="Enter only alphabets"
                                                    data-val-regex-pattern="([a-zA-Z ]+)"
                                                    data-val-required="The City field is required." id="City"
                                                    name="City" placeholder="Your City" type="text"
                                                    value="Pune">
                                                <span class="field-validation-valid text-danger" data-valmsg-for="City"
                                                    data-valmsg-replace="true"></span>

                                            </div>
                                            <div class="width_50">
                                                <h5>Referral Code</h5>
                                                <input id="ReferCode" name="ReferCode" placeholder="ReferCode"
                                                    readonly="readonly" type="text" value="rpwegp">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="">
                                        <input type="submit" value="Submit" class="mc-btn btn-style-1">
                                        <a href="{{ route('userpanel.change_password') }}" class="mc-btn btn-style-1"
                                            style="margin-left:10px;">Changes Password</a>
                                    </div>

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
