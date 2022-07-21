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

            @can('shop-create')
                <form method="post" action="{{ route('shops.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row align-items-center">
                        <div class="border-0 mb-4">
                            <div
                                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                <h3 class="fw-bold mb-0">Add New Shop</h3>
                                @if ($userRole != 'Vendor')
                                    <a href="{{ route('shops.index') }}"
                                        class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                                @endif
                            </div>
                        </div>
                    </div> <!-- Row end  -->

                    @include('toastr')

                    <div class="row g-3 mb-3">
                        <div class="col-lg-4">
                            <div class="sticky-lg-top">
                                <div class="card mb-3">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Shop Vendor Name</h6>
                                    </div>

                                    {{-- @if (!empty(Auth::user()->getRoleNames()))
                                        @foreach (Auth::user()->getRoleNames() as $v)
                                            <?php $userRole = $v; ?>
                                        @endforeach
                                    @endif --}}
                                    <div class="card-body">
                                        <label class="form-label">Vendor Name</label>
                                        @if ($userRole == 'Vendor')
                                            <select type="text" name="user_id" class="form-control">
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            </select>
                                        @else
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class="card mb-3">
                                    <div class="card-header py-3 bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Upload Shop Image</h6>
                                        <small>With image and default file try to remove the image</small>
                                    </div>
                                    <div class="card-body">
                                        <input type="file" id="dropify-image" name="photo">
                                        <!-- data-default-file="{{ asset('dist/assets/images/product/cropimg-upload.jpg') }}"> -->
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold ">Shop information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Shop Name</label>
                                            <input type="text" id="name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter Fullname" value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                                placeholder="Enter Description" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{-- <div class="col-md-6">
                                            <label for="gstin" class="form-label">GSTIN</label>
                                            <input type="text" id="gstin" name="gstin" class="form-control @error('gstin') is-invalid @enderror"
                                                placeholder="Enter GSTIN" value="{{ old('gstin') }}">
                                            @error('gstin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-6">
                                        <button type="submit"
                                            class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row end  -->
                </form>
            @endcan

        </div>
    </div>
@endsection

@section('js')
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

    <script type="text/javascript">
        $(document).ready(function() {
            $("#gstin").change(function() {
                var inputvalues = $(this).val();
                var gstinformat = new RegExp('^([0-9]){2}([A-Za-z]){5}([0-9]){4}([A-Za-z]){1}([0-9]{1})([A-Za-z]){2}?$');
                if (gstinformat.test(inputvalues)) {
                    return true;
                } else {
                    alert('Please Enter Valid GSTIN Number');
                    $("#gstin").val('');
                    $("#gstin").focus();
                }
            });
        });
    </script>
@endsection
