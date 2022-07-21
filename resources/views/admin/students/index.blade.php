@extends('admin.layouts.app')

@section('header')
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
                        <h3 class="fw-bold mb-0">Manage Students</h3>
                        @can('student-create')
                            <a href="{{ route('students.create') }}" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                    class="icofont-plus-circle me-2 fs-6"></i> Add New Student</a>
                        @endcan
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 0%">#</th>
                                        <th style="width: 0%">ID</th>
                                        <th style="width: 0%">Photo</th>
                                        <th style="width: 0%">Referral Code</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 0%">Contact No</th>
                                        <th style="width: 0%">Gender</th>
                                        <th style="width: 0%">Qualification</th>
                                        <th style="width: 0%">Refer By</th>
                                        <th style="width: 0%">Status</th>
                                        <th style="width: 0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $student->id }}</td>
                                            <td><img @if ($student->photo) src="{{ asset('student/' . $student->photo) }}"
                                                @else
                                                    src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                                                    class="img-thumbnail m-0 p-0" width="50" height="50"></td>
                                            <td><strong>{{ $student->refer_code }}</strong></td>
                                            <td>{{ $student->fullname }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }} (PH)<br>
                                                {{ $student->whatsappno }} (WA)</td>
                                            <td>{{ $student->gender == 'M' ? 'Male' : 'Female' }}</td>
                                            <td>{{ $student->qualification->name }}</td>
                                            <td>{{ $student->refer_by }}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" id="list-group2" data-id="{{ $student->id }}"
                                                        class="form-check-input" {{ $student->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    @can('student-read')
                                                        <a href="{{ route('students.show', $student->id) }}"
                                                            class="btn btn-outline-secondary" title="Show">
                                                            <i class="icofont-eye-alt text-primary"></i></a>
                                                    @endcan

                                                    @can('student-update')
                                                        <a href="{{ route('students.chpwd', $student->id) }}"
                                                            class="btn btn-outline-secondary" title="Change Password">
                                                            <i class="icofont-key text-warning"></i></a>

                                                        <a href="{{ route('students.edit', $student->id) }}"
                                                            class="btn btn-outline-secondary" title="Edit">
                                                            <i class="icofont-edit text-success"></i></a>
                                                    @endcan

                                                    @can('student-delete')
                                                        <form id="delete-form-{{ $student->id }}" method="post"
                                                            action="{{ route('students.destroy', $student->id) }}"
                                                            style="display: none">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                        <a href="" class="btn btn-outline-secondary" title="Delete"
                                                            onclick="
                                                            if(confirm('Are you sure, You Want to delete this?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $student->id }}').submit();
                                                            }
                                                            else{
                                                            event.preventDefault();
                                                            }">
                                                            <i class="icofont-ui-delete text-danger"></i></a>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="11">Data not found !!</td>
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
    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var student_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStudentStatus',
                    data: {
                        "student_id": student_id,
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
