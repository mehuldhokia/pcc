@extends('admin.layouts.app')

@section('header')
    <!-- Dropify Css -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">

            <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Add New Course</h3>
                            <div align="right" class="w-sm-100">
                                <button type="submit"
                                    class="btn btn-primary btn-set-task w-sm-100 py-2= px-5 text-uppercase">Submit</button>
                                <a href="{{ route('courses.index') }}"
                                    class="btn btn-secondary btn-set-task w-sm-100 py-2= text-uppercase">Back</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                @include('toastr')

                <div class="row clearfix g-3">
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Course Information</h6>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-3">
                                        <label for="course_code" class="form-label">Course Code</label>
                                        <input type="text" id="course_code" name="course_code"
                                            class="form-control @error('course_code') is-invalid @enderror"
                                            placeholder="Enter Course Code" value="{{ old('course_code') }}" required>
                                        @error('course_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-9">
                                        <label for="title" class="form-label">Course Title</label>
                                        <input type="text" id="title" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter Course Title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="ckeditor form-control" placeholder="Enter Course Description Here"
                                            rows="4" required>{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <div class="input-group">
                                            <span id="r" class="input-group-text">₹</span>
                                            <input type="number" id="amount" name="amount"
                                                class="form-control @error('amount') is-invalid @enderror"
                                                placeholder="Enter Amount" value="{{ old('amount') }}" required>
                                            @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Course Details</h6>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label for="duration" class="form-label">Duration</label>
                                        <select id="duration" name="duration" class="form-select"
                                            aria-label="Default select example">
                                            <option value=""> - - select course duration - - </option>
                                            <option value="6 Months">6 Months</option>
                                            <option value="1 Year">1 Year</option>
                                            <option value="2 Years">2 Years</option>
                                            <option value="3 Years">3 Years</option>
                                            <option value="4 Years">4 Years</option>
                                        </select>
                                        @error('duration')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="qualification" class="form-label">Qualification</label>
                                        <input type="text" id="qualification" name="qualification"
                                            class="form-control @error('qualification') is-invalid @enderror"
                                            placeholder="Enter Qualification" value="{{ old('qualification') }}"
                                            required>
                                        @error('qualification')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="row= g-3 align-items-center">
                                <div class="col-md-12=">
                                    <div class="sticky-lg-top">
                                        <div class="card">
                                            <div class="card-header py-3 bg-transparent border-bottom-0">
                                                <h6 class="m-0 fw-bold">Upload Course Image</h6>
                                                <small class="d-block text-muted mb-2">Only portrait or square images, 2M
                                                    max and 2000px max-height.</small>
                                            </div>
                                            <div class="card-body pt-0">
                                                <input type="file" name="blob" id="input-file-to-destroy"
                                                    class="dropify" data-allowed-formats="portrait square "
                                                    data-max-file-size="2M" data-max-height="2000" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->
            </form>

        </div>
    </div>
@endsection

@section('js')
    <!-- My CUSTOM CKEditor Integration -->
    <script src="{{ asset('dist/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('dist/ckeditor/ckeditor_integration.js') }}"></script>

    <!-- Jquery Plugin -->
    <script src="{{ asset('dist/assets/plugin/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/plugin/cropper/cropper-init.js') }}"></script>
    <script src="{{ asset('dist/assets/bundles/dropify.bundle.js') }}"></script>

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

    <script>
        // $(window).on('load', function () {
        //     $('#description').ckeditor();
        // });

        $(document).ready(function() {
            setzero(`#amount`);
        });

        $(`#amount`).on('input', function() {
            setzero(`#amount`);
        });

        $('#amount').on('blur', function() {
            if ($(this).val() < 0) {
                alert("Amount is not less than 0 !!");
                $(this).val(0).focus();
            }
        });

        function setzero(x) {
            if ($(x).val() == "") {
                $(x).val('0');
            } else if ($(x).val() > 0) {
                // console.log($(x).val());
                $(x).val().replace(0, '');
            }
            if ($(x).val() != 0) {
                var text = $(x).val();
                if (text.slice(0, 1) == 0) {
                    $(x).val(text.slice(1, text.length));
                }
            }
        }
    </script>
@endsection
