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
                        <h3 class="fw-bold mb-0">Manage Contacts</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->

            {{-- @include('messages') --}}
            @include('toastr')


            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <button class="btn btn-outline-danger btn-sm mb-3 delete_all"
                                data-url="{{ url('contactsDeleteAll') }}">Delete All Selected</button>

                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 0%"><input type="checkbox" id="master"></th>
                                        <th style="width: 5%">#</th>
                                        <th>Date</th>
                                        <th>Person Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th style="width: 0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($contacts as $contact)
                                        <tr>
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $contact->id }}"></td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $contact->created_at->format('d-m-Y h:i A') }}</td>
                                            <td>{{ $contact->fullname }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->subject }}</td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="#show{{ $contact->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary"><i
                                                            class="icofont-eye-alt text-primary"></i></a>
                                                    @can('contact-delete')
                                                        <a href="#delete{{ $contact->id }}" data-bs-toggle="modal"
                                                            class="btn btn-outline-secondary deleterow"><i
                                                                class="icofont-ui-delete text-danger"></i></a>
                                                    @endcan
                                                </div>
                                            </td>
                                            @include('admin.contacts.actionmodel')
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="7">Data not found !!</td>
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
                var contact_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeContactStatus',
                    data: {
                        "contact_id": contact_id,
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
