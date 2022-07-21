@extends('admin.layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugin css file  -->
    {{-- <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}"> --}}

    <!--plugin css file -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">

    <style>
        .galleryImg {
            display: block;
            padding: 5px;
            background: white;
        }

        .video_icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 50px !important;
            opacity: .75;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;

        }

        .videoPlay:hover .video_icon {
            opacity: 1;
            zoom: 1.2;
            -webkit-transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/md-font.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/library/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/library/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/library/owl.carousel.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/style.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/styles/css/mklb.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker3.min.css">

    <!-- Load jQuery -->
    {{-- <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/jquery-1.11.0.min.js') }}"></script> --}}
    {{-- <script type='text/javascript' src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/bootstrap.min.js') }}"></script> --}}
    {{-- <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/jquery.owl.carousel.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/jquery.appear.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/perfect-scrollbar.min.js') }}"></script>
    {{-- <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script> --}}

    {{-- <script type='text/javascript' src="{{ asset('assets/styles/scripts/library/jquery.validate.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('assets/styles/scripts/library/jquery.validate.unobtrusive.min.js') }}"></script> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script> --}}
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-3">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Manage Video Gallery</h3>
                        @can('video-create')
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#addModelForm"><i class="icofont-plus-circle me-2 fs-6"></i>Add New
                                Video</button>
                        @endcan
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            @if ($totalVideos)
                <div class="row mt-0">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                        <input type="checkbox" id="master"> &nbsp;<label class="form-label">Bulk Delete</label>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                        <button class="btn btn-outline-danger btn-sm delete_all w-sm-100"
                            data-url="{{ url('videosDeleteAll') }}"><small>Delete All Selected</small></button>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                        <label class="form-label float-end">Total Videos : {{ $totalVideos }}</label>
                    </div>
                </div>
                <hr class="mt-1">
            @endif

            <div class="row g-4">
                @forelse ($videos as $video)
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-12">
                        <div class="card h-100">
                            <img @if ($video->blob) src="{{ asset('gallery/' . $video->blob) }}"
                                @else
                                    src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                                class="card-img-top" height="100%">
                            <div class="card-body">
                                <p class="card-text text-center">
                                    @if ($video->title)
                                        {{ $video->title }}
                                    @else
                                        <span class="text-danger">Video Title not available</span>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-2 pt-2">
                                        <input type="checkbox" class="sub_chk" title="Multiple Deletion Checkbox"
                                            data-id="{{ $video->id }}">
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-2">
                                        @can('video-update')
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" id="list-group2" data-id="{{ $video->id }}"
                                                    title="Change Status" class="form-check-input"
                                                    {{ $video->status ? 'checked' : '' }}>
                                            </div>
                                        @endcan
                                    </div>
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-8">
                                        <div class="btn-group float-end" role="group" aria-label="Basic outlined example">
                                            <a href="#show{{ $video->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-secondary" title="Show">
                                                <i class="icofont-eye-alt text-primary"></i></a>

                                            @can('video-update')
                                                <a href="#edit{{ $video->id }}" data-bs-toggle="modal"
                                                    class="btn btn-outline-secondary" title="Edit">
                                                    <i class="icofont-edit text-success"></i></a>
                                            @endcan

                                            @can('video-delete')
                                                <a href="#delete{{ $video->id }}" data-bs-toggle="modal"
                                                    class="btn btn-outline-secondary deleterow" title="Delete">
                                                    <i class="icofont-ui-delete text-danger"></i></a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                                @include('admin.videos.actionmodel')

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-4 offset-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <img class="card-img-top" src="{{ asset('dist/assets/images/default-empty.png') }}"
                                    alt="" />
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

    <!-- Add Video Model -->
    <div class="modal fade" id="addModelForm" tabindex="-1" aria-hidden="true" aria-labelledby="addModelLabel">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addLabel">Add Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('videos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Video Title</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter Video Title" value="{{ old('title') }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="url" class="form-label">Video URL</label>
                                <input type="text" id="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror" placeholder="Enter Video URL"
                                    value="{{ old('url') }}">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="m-0 fw-bold">Upload Video Image</h6>
                            <small>With image and default file try to remove the image</small>
                            <input type="file" class="dropify-element" id="dropify-image" name="blob">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('dist/multiple_records_checkbox_delete.js') }}"></script>

    <!-- Jquery Plugin -->
    <script src="{{ asset('dist/assets/plugin/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/plugin/cropper/cropper-init.js') }}"></script>
    <script src="{{ asset('dist/assets/bundles/dropify.bundle.js') }}"></script>

    <!-- Load jQuery -->
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/library/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/scripts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/styles/scripts/mklb.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var video_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeVideosStatus',
                    data: {
                        "video_id": video_id,
                        "status": status,
                    },
                    success: function(data) {
                        // console.log(data.success);
                        // alert(data.success);
                        toastr.success(data.success, 'Success');
                    }
                });
            });
        });
    </script>


    <script>
        $(function() {
            $('.dropify').dropify();

            // var drEvent = $('#dropify-image').dropify();
            var drEvent = $('.dropify-element').dropify();
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
        // $('#myDataTable')
        //     .addClass('nowrap')
        //     .dataTable({
        //         responsive: true,
        //         columnDefs: [{
        //             targets: [-1, -3],
        //             className: 'dt-body-right'
        //         }]
        //     });
        // $('.deleterow').on('click', function() {
        //     var tablename = $(this).closest('table').DataTable();
        //     tablename
        //         .row($(this)
        //             .parents('tr'))
        //         .remove()
        //         .draw();

        // });
    </script>
@endsection
