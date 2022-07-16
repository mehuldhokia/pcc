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
    <!-- SUB BANNER -->
    <section class="sub-banner section">
        <div class="awe-parallax bg-profile-feature"></div>
        <div class="awe-overlay overlay-color-3"></div>
        <div class="container">
            <div class="sub-banner-content">
                <h2 class="big">Contact Us</h2>
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
    <section class="categories-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-push-2">
                    <h2>Feel Free to Contact Us</h2>
                </div>
                <div class="col-md-5 col-md-push-2" style="margin-top:-25px;">
                    <div class="content grid">

                        <form id="ContactForm" method="post" action="{{ route('website.contactsubmit') }}">
                            @csrf

                            <div class="form-yourname">
                                <input type="text" name="fullname" id="" placeholder="Full Name" required>
                            </div>
                            <div class="form-yourmail">
                                <input type="email" name="email" id="" placeholder="Your Email Address"
                                    required>
                            </div>
                            <div class="form-phone">
                                <input type="number" name="phone" id="" placeholder="Your Phone Number"
                                    required>
                            </div>
                            <div class="form-yourname">
                                <input type="text" name="subject" id="" placeholder="Enter Subject" required>
                            </div>
                            <div class="form-textarea">
                                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-submit-1">
                                <input type="submit" id="btnSubmit" value="Submit" name="submit"
                                    class="mc-btn btn-style-1">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- SIDEBAR CATEGORIES -->
                <div class="col-md-4 col-md-push-2">
                    <div class="sidebar-course-intro border-radius-4" style="margin-top: 8px;">
                        <div class="widget widget_equipment">
                            <i class="icon fa fa-map-marker"></i>
                            <h4 class="xsm black bold">Head Office:</h4>
                            <div class="equipment-body contact">
                                <h4>PCC Foundation</h4>
                                <p>
                                    Shop no.15, 2<sup>nd</sup> Floor, Ananddham Complex,<br />
                                    S.T. Station, Veraval, Dist.: Gir-Somnath.<br />Pin : 362 265
                                </p>
                                <p>
                                    <a href="tel:+919909094300"><i class="fa fa-phone"></i> : +91 99090 94300</a>
                                </p>
                                <a href="mailto:itmsguj@gmail.com"><i class="fa fa-envelope"></i> :
                                    itmsguj@gmail.com</a>
                            </div>
                        </div>
                        <div class="widget widget_share contact">
                            <div class="share-body">
                                <a href="https://www.facebook.com/pccfoundationindia/" target="_blank" class="facebook"
                                    title="facebook">
                                    <i class="icon md-facebook-1 fa fa-facebook"></i>
                                </a>
                                <a href="https://www.instagram.com/pccfounda/" target="_blank" class="instagram"
                                    title="instagram">
                                    <i class="icon md-insta fa fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-course-intro border-radius-4" style="margin-top: 20px;">
                        <div class="widget widget_equipment">
                            <i class="icon fa fa-map-marker"></i>
                            <h4 class="xsm black bold">WBR Office:</h4>
                            <div class="equipment-body contact">
                                <h4>World book of Records - U.K.<br />Shailesh Barad</h4>
                                <p>
                                    Shop no.15, 2<sup>nd</sup> Floor, Ananddham Complex,<br />
                                    S.T. Station, Veraval, Dist.: Gir-Somnath.<br /> Pin:362 265
                                </p>
                                <p>
                                    <a href="tel:+919925453208"><i class="fa fa-phone"></i> : +91 99254 53208</a>
                                </p>
                                <a href="mailto:surashtra@alma.in"><i class="fa fa-envelope"></i> :
                                    surashtra@alma.in</a>
                                <a href="https://worldbookofrecords.uk/" target="_blank"><i class="fa fa-link"></i>
                                    : www.worldbookofrecods.uk</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END / SIDEBAR CATEGORIES -->
            </div>
        </div>
    </section>
    <!-- END / CATEGORIES CONTENT -->

    <!-- CATEGORIES CONTENT -->
    <section class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d931.746927295111!2d70.36203467356476!3d20.912814149659695!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bfd33a7a59a8213%3A0x265caf15684b59ae!2sShailesh%20Barad%20-%20World%20book%20of%20Records%2Cuk!5e0!3m2!1sen!2sin!4v1650172909853!5m2!1sen!2sin"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    <!-- END / CATEGORIES CONTENT -->
@endsection

@section('js')
    <script type="text/javascript">
        // #UserForm
        $(document).ready(function() {
            // debugger;
            $('#btnSubmit').click(function() {
                //check if form is valid using model annotation
                if ($("#ContactForm").valid()) {
                    $('#ContactForm').submit();
                } else {
                    toastr.error("Message not submitted", 'Error');

                    return false;
                }
            });
            $("#ContactForm").on("submit", function(event) {
                // debugger;
                event.preventDefault();
                $('#btnSubmit').attr('disabled', 'disabled');
                var url = $(this).attr("action");
                var formData = $(this).serialize();
                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    beforeSend: function() {
                        toastr.info("Please wait until your request is processed...", 'Info');
                    },
                    success: function(response) {
                        // debugger;
                        // if (response.success == true) {
                        //     window.location = "http://127.0.0.1:8000/Home/Thanks";
                        //     // window.location = "http://pcc.ginfotech2017.com/Home/Thanks";
                        // }

                        // console.log(response.success);
                        // alert(response.success);
                        toastr.success(response.success, 'Success');
                    },
                });
            });
        });
    </script>
@endsection
