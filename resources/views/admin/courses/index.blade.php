@extends('admin.layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Manage Courses</h3>
                        <div class="col-auto d-flex w-sm-100">
                            @can('course-create')
                                <a href="{{ route('courses.create') }}"
                                    class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                        class="icofont-plus-circle me-2 fs-6"></i> Add Course</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">

                            <button class="btn btn-outline-danger btn-sm mb-3 delete_all"
                                data-url="{{ url('coursesDeleteAll') }}">Delete All Selected</button>

                            <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 0%"><input type="checkbox" id="master"></th>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 10%">Image</th>
                                        <th>Course Code</th>
                                        <th>Title</th>
                                        <th>Amount</th>
                                        <th>Duration</th>
                                        <th style="width: 0%">Status</th>
                                        <th style="width: 0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($courses as $course)
                                        <tr>
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $course->id }}"></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img @if ($course->blob) src="{{ asset('course/' . $course->blob) }}"
                                                @else
                                                    src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                                                    class="img-thumbnail m-0 p-0" width="50" height="50"></td>
                                            <td>{{ $course->course_code }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>₹{{ $course->amount }}</td>
                                            <td>{{ $course->duration }}</td>
                                            <td>
                                                @can('course-update')
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" id="list-group2" data-id="{{ $course->id }}"
                                                            title="Change Status" class="form-check-input"
                                                            {{ $course->status ? 'checked' : '' }}>
                                                    </div>
                                                @endcan
                                            </td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="#show{{ $course->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary" title="Show">
                                                        <i class="icofont-eye-alt text-primary"></i></a>

                                                    @can('course-update')
                                                        <a href="{{ route('courses.edit', $course->id) }}"
                                                            class="btn btn-outline-secondary" title="Edit">
                                                            <i class="icofont-edit text-success"></i></a>
                                                    @endcan

                                                    @can('course-delete')
                                                        {{-- <form id="delete-form-{{ $course->id }}" method="post"
                                                            action="{{ route('courses.destroy', $course->id) }}"
                                                            style="display: none">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                        <a href="" class="btn btn-outline-secondary" title="Delete"
                                                            onclick="if(confirm('Are you sure, You Want to delete this?')) { event.preventDefault(); document.getElementById('delete-form-{{ $course->id }}').submit(); } else { event.preventDefault(); }">
                                                            <i class="icofont-ui-delete text-danger"></i> Delete
                                                        </a> --}}

                                                        <a href="#delete{{ $course->id }}" data-bs-toggle="modal"
                                                            class="btn btn-outline-secondary deleterow" title="Delete">
                                                            <i class="icofont-ui-delete text-danger"></i></a>
                                                    @endcan
                                                </div>
                                            </td>
                                            @include('admin.courses.actionmodel')
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="9">Data not found !!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- Row End -->
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('dist/multiple_records_checkbox_delete.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var course_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeCourseStatus',
                    data: {
                        "course_id": course_id,
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
        // project data table
        $(document).ready(function() {
            $('#myProjectTable')
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [-1, -3],
                        className: 'dt-body-right'
                    }]
                });
            $('.deleterow').on('click', function() {
                var tablename = $(this).closest('table').DataTable();
                tablename
                    .row($(this)
                        .parents('tr'))
                    .remove()
                    .draw();

            });
        });
    </script>
@endsection
