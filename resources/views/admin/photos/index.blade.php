@extends('admin.layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">

    <!--plugin css file -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-3">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Manage Photo Gallery</h3>
                        @can('photo-create')
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#addModelForm"><i class="icofont-plus-circle me-2 fs-6"></i>Add New
                                Photo</button>
                        @endcan
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            @if ($totalPhotos)
                <div class="row mt-0">
                    <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                        <input type="checkbox" id="master"> &nbsp;<label class="form-label">Bulk Delete</label>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-6">
                        <button class="btn btn-outline-danger btn-sm delete_all w-sm-100"
                            data-url="{{ url('photosDeleteAll') }}"><small>Delete All Selected</small></button>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-6 col-12">
                        <label class="form-label float-end">Total Photos : {{ $totalPhotos }}</label>
                    </div>
                </div>
                <hr class="mt-1">
            @endif

            <div class="row g-4">
                @forelse ($photos as $photo)
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-12">
                        <div class="card h-100">
                            <img @if ($photo->blob) src="{{ asset('gallery/' . $photo->blob) }}"
                                @else
                                    src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                                class="card-img-top" height="100%">

                            <div class="card-body">
                                <p class="card-text text-center">
                                    @if ($photo->description)
                                        {{ $photo->description }}
                                    @else
                                        <span class="text-danger">Description not available</span>
                                    @endif
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-2 col-2 pt-2">
                                        <input type="checkbox" class="sub_chk" title="Multiple Deletion Checkbox"
                                            data-id="{{ $photo->id }}">
                                    </div>
                                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-4 col-2">
                                        @can('photo-update')
                                            <div class="form-check form-switch mt-2">
                                                <input type="checkbox" id="list-group2" data-id="{{ $photo->id }}"
                                                    title="Change Status" class="form-check-input"
                                                    {{ $photo->status ? 'checked' : '' }}>
                                            </div>
                                        @endcan
                                    </div>
                                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-6 col-8">
                                        <div class="btn-group float-end" role="group" aria-label="Basic outlined example">
                                            <a href="#show{{ $photo->id }}" data-bs-toggle="modal"
                                                class="btn btn-outline-secondary" title="Show">
                                                <i class="icofont-eye-alt text-primary"></i></a>

                                            @can('photo-update')
                                                <a href="#edit{{ $photo->id }}" data-bs-toggle="modal"
                                                    class="btn btn-outline-secondary" title="Edit">
                                                    <i class="icofont-edit text-success"></i></a>
                                            @endcan

                                            @can('photo-delete')
                                                <a href="#delete{{ $photo->id }}" data-bs-toggle="modal"
                                                    class="btn btn-outline-secondary deleterow" title="Delete">
                                                    <i class="icofont-ui-delete text-danger"></i></a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                                @include('admin.photos.actionmodel')

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

    <!-- Add Photo Model -->
    <div class="modal fade" id="addModelForm" tabindex="-1" aria-hidden="true" aria-labelledby="addModelLabel">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addLabel">Add Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('photos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <h6 class="m-0 fw-bold">Upload Image</h6>
                            <small>With image and default file try to remove the image</small>
                            <input type="file" class="dropify-element" id="dropify-image" name="blob">
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter Description" rows="4">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var photo_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changePhotosStatus',
                    data: {
                        "photo_id": photo_id,
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
