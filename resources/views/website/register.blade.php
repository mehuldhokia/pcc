@extends('website.layouts.app')

@section('header')
    <style>
        /* Hide Input Number Arrows */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('content')
    <!-- REGISTER -->
    <section id="login-content" class="login-content">
        <div class="awe-parallax bg-login-content"></div>
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="row">
                <!-- FORM -->

                <form id="RegisterForm" method="post" action="{{ route('userprofile.registersubmit') }}"
                    enctype="multipart/form-data" onsubmit="return validate();">
                    @csrf

                    <div class="col-lg-6 col-md-offset-3">
                        <div class="form-login" style="max-width:100%;border-radius: 10px;">

                            <h2 class="text-uppercase">sign up</h2>

                            <div class="form-email">
                                <input type="text" name="fullname" placeholder="Full Name"
                                    class="form-control @error('fullname') is-invalid @enderror"
                                    value="{{ old('fullname') }}" required>
                                @error('fullname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-email">
                                <input type="email" name="email" placeholder="Your Email Address"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-email">
                                <input type="number" name="phone" placeholder="Your Mobile Number"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-email">
                                <input type="number" name="whatsappno" placeholder="Your WhatsApp Number"
                                    class="form-control @error('whatsappno') is-invalid @enderror"
                                    value="{{ old('whatsappno') }}" required>
                                @error('whatsappno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-question mc-select">
                                <select name="gender" id="gender"
                                    class="form-control select @error('gender') is-invalid @enderror" required>
                                    <option value="">Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-email">
                                <input type="date" name="dob" id="dob" placeholder="DD/MM/YYYY"
                                    class="form-control w-100" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                            </div>
                            <div class="form-email">
                                <textarea id="uaddress" name="uaddress" class="form-control @error('uaddress') is-invalid @enderror"
                                    placeholder="Enter Your Address" rows="3">{{ old('uaddress') }}</textarea>
                                @error('uaddress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-email">
                                <input type="text" name="city" placeholder="Your City"
                                    class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}"
                                    required>
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-question mc-select">
                                <select class="select" id="qualification_id" name="qualification_id">
                                    <option value="0"> - Select Qualification - </option>
                                    @foreach ($qualifications as $q)
                                        <option value="{{ $q->id }}">{{ $q->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-password">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="6+ characters required">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-email">
                                <input type="text" name="refer_code" id="refer_code" placeholder="Referral Code"
                                    class="form-control @error('refer_code') is-invalid @enderror"
                                    value="{{ old('refer_code') }}">
                                @error('refer_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-email">
                                <input type="file" name="photo" style="padding-top: 5px; height: 37px;"
                                    class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}"
                                    required>
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <input type="hidden" name="created_date" id="created_date"
                                class="form-control current_date"> --}}

                            <div class="form-submit-1">
                                <input type="submit" id="btnSubmit" value="Sign Up" class="mc-btn btn-style-1">
                            </div>
                            <div class="link">
                                <a href="{{ route('userprofile.loginpage') }}">
                                    <i class="icon md-arrow-right"></i>Already have account ? Log in
                                </a>
                            </div>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- END / REGISTER -->
@endsection

@section('js')
    <script src="styles/scripts/master.js"></script>
    <script src="styles/scripts/register.js"></script>

    <script>
        // var today;
        // $(document).ready(function() {
        //     // Set Default Date
        //     today = new Date();
        //     var dd = String(today.getDate()).padStart(2, '0');
        //     var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        //     var yyyy = today.getFullYear();
        //     today = yyyy + '-' + mm + '-' + dd;
        //     $(`.current_date`).val(today);
        // });

        // $('#RegisterForm').submit(function() {
        function validate() {
            if ($(`#qualification_id`).val() == 0) {
                alert("Qualification not selected");
                $(`#qualification_id`).focus();
                return false;
            } else {
                return true;
            }
        }
        // );

        $("#refer_code").on("blur", function(e) {
            e.preventDefault();

            var rc = $("#refer_code").val();
            if (rc) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/chk_refcode') }}/" + rc,
                    success: function(data) {
                        if (!data) {
                            toastr.error("Invalid Referral Code");
                            $("#refer_code").select();
                        }
                    },
                });
            }
        });
    </script>
@endsection
