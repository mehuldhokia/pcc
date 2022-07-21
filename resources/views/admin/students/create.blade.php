@extends('admin.layouts.app')

@section('header')
    <!--plugin css file -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">

            <form method="post" action="{{ route('students.store') }}" enctype="multipart/form-data"
                onsubmit="return validate();">
                @csrf

                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add New Student</h3>
                            <div align="right">
                                <button type="submit" id="btnSubmit"
                                    class="btn btn-primary btn-set-task w-sm-100 py-2= px-5 text-uppercase">Store</button>
                                <a href="{{ route('students.index') }}"
                                    class="btn btn-secondary btn-set-task w-sm-100 py-2= text-uppercase btn-set-task w-sm-100">Back</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                @include('toastr')

                <div class="row g-3 mb-3">

                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Student Information</h6>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-6">
                                        <label for="fullname" class="form-label">Fullname</label>
                                        <input type="text" id="fullname" name="fullname"
                                            class="form-control @error('fullname') is-invalid @enderror"
                                            placeholder="Enter Fullname" value="{{ old('fullname') }}" required>
                                        @error('fullname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="name@example.com" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Mobile Number</label>
                                        <input type="number" id="phone" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter Mobile Number" value="{{ old('phone') }}" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="whatsappno" class="form-label">WhatsApp Number</label>
                                        <input type="number" id="whatsappno" name="whatsappno"
                                            class="form-control @error('whatsappno') is-invalid @enderror"
                                            placeholder="Enter WhatsApp Number" value="{{ old('whatsappno') }}" required>
                                        @error('whatsappno')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">Birthdate</label>
                                        <input type="date" name="dob"
                                            class="form-control @error('dob') is-invalid @enderror"
                                            pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" value="{{ old('dob') }}" required>
                                        @error('dob')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Gender</label><br>
                                        <input name="gender" class="form-check-input=" type="radio" value="M"
                                            checked> Male &nbsp;&nbsp;
                                        <input name="gender" class="form-check-input=" type="radio" value="F">
                                        Female
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" placeholder="6+ characters required"
                                            autocomplete="new-password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirm_password" class="form-label">Confirm
                                            Password</label>
                                        <input type="password" id="confirm_password" name="confirm_password"
                                            class="form-control @error('confirm_password') is-invalid @enderror"
                                            value="{{ old('confirm_password') }}" placeholder="6+ characters required"
                                            autocomplete="new-password" required>
                                        @error('confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="gender" class="form-label">Education Qualification</label>
                                        <select name="qualification_id" id="qualification_id" class="form-control"
                                            required>
                                            <option value="0"> - Select Qualification - </option>
                                            @foreach ($qualifications as $q)
                                                <option value="{{ $q->id }}">{{ $q->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="refer_code" class="form-label">Referral Code</label>
                                        <input type="text" name="refer_code" id="refer_code"
                                            placeholder="Referral Code"
                                            class="form-control @error('refer_code') is-invalid @enderror"
                                            value="{{ old('refer_code') }}">
                                        @error('refer_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sticky-lg-top">

                            <div class="card mb-3">
                                <div class="card-header py-3 bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Location Details</h6>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="uaddress" class="form-label">Address</label>
                                            <textarea id="uaddress" name="uaddress" class="form-control @error('uaddress') is-invalid @enderror"
                                                placeholder="Enter Address" rows="3" required>{{ old('uaddress') }}</textarea>
                                            @error('uaddress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" placeholder="City"
                                                class="form-control @error('city') is-invalid @enderror"
                                                value="{{ old('city') }}" required>
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-header py-3 bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Upload Student Photo</h6>
                                    <small>With image and default file try to remove the image</small>
                                </div>
                                <div class="card-body pt-0">
                                    <input type="file" id="dropify-image" name="photo" required>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- Row end  -->
            </form>

        </div>
    </div>
@endsection

@section('js')
    <!-- Jquery Plugin -->
    <script src="{{ asset('dist/assets/plugin/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/plugin/cropper/cropper-init.js') }}"></script>
    <script src="{{ asset('dist/assets/bundles/dropify.bundle.js') }}"></script>

    <script>
        function validate() {
            if ($(`#qualification_id`).val() == 0) {
                alert("Qualification not selected");
                $(`#qualification_id`).focus();
                return false;
            }
            return true
        }

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

    <script>
        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-image').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });
        });
    </script>
@endsection
