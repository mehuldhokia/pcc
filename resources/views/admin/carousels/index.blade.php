@extends('admin.layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Manage Carousels</h3>
                        @can('carousel-create')
                            <a href="{{ route('carousels.create') }}"
                                class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                    class="icofont-plus-circle me-2 fs-6"></i> Create New Carousel</a>
                        @endcan
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <button class="btn btn-outline-danger btn-sm mb-3 delete_all"
                                data-url="{{ url('carouselsDeleteAll') }}">Delete All Selected</button>

                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 0%"><input type="checkbox" id="master"></th>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 10%">Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th style="width: 0%">Status</th>
                                        <th style="width: 0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carousels as $carousel)
                                        <tr>
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $carousel->id }}"></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img @if ($carousel->blob) src="{{ asset('carousel/' . $carousel->blob) }}"
                                                @else
                                                    src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                                                    class="img-thumbnail m-0 p-0" width="70" height="50"></td>
                                            <td>{{ $carousel->title }}</td>
                                            <td>{{ $carousel->description }}</td>
                                            <td>
                                                @can('carousel-update')
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" id="list-group2" data-id="{{ $carousel->id }}"
                                                            class="form-check-input" title="Change Status"
                                                            {{ $carousel->status ? 'checked' : '' }}>
                                                    </div>
                                                @endcan
                                            </td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    @can('carousel-update')
                                                        <a href="{{ route('carousels.edit', $carousel->id) }}"
                                                            class="btn btn-outline-secondary" title="Edit">
                                                            <i class="icofont-edit text-success"></i></a>
                                                    @endcan

                                                    @can('carousel-delete')
                                                        <form id="delete-form-{{ $carousel->id }}" method="post"
                                                            action="{{ route('carousels.destroy', $carousel->id) }}"
                                                            style="display: none">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                        <a href="" class="btn btn-outline-secondary" title="Delete"
                                                            onclick="if(confirm('Are you sure, You Want to delete this?')) { event.preventDefault(); document.getElementById('delete-form-{{ $carousel->id }}').submit(); } else { event.preventDefault(); }">
                                                            <i class="icofont-ui-delete text-danger"></i>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="8">Data not found !!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('dist/multiple_records_checkbox_delete.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var carousel_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeCarouselStatus',
                    data: {
                        "carousel_id": carousel_id,
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
