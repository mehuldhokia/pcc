@extends('admin.layouts.app')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
@endsection

<!--
    REFERENCE
    https://tutorial101.blogspot.com/2022/04/laravel-9-crud-create-read-update-and_14.html
-->

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Manage Roles</h3>
                        <div class="col-auto d-flex w-sm-100">
                            <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal"
                                data-bs-target="#addModelForm"><i class="icofont-plus-circle me-2 fs-6"></i>Add New
                                Role</button>
                        </div>
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('messages')

            <div class="row clearfix g-3">
                <div class="col-sm-12">
                    <div class="card mb-3">
                        <div class="card-body">

                            <button class="btn btn-outline-danger btn-sm mb-3 delete_all"
                                data-url="{{ url('rolesDeleteAll') }}">Delete All Selected</button>

                            <table id="RoleTable" class="table table-hover align-middle mb-0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 0%"><input type="checkbox" id="master"></th>
                                        <th width="50">#</th>
                                        <th>Role Name</th>
                                        <th width="220">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $role->id }}">
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="#show{{ $role->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary"><i
                                                            class="icofont-eye-alt text-primary"></i> Show</a>

                                                    <a href="#edit{{ $role->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary"><i
                                                            class="icofont-edit text-success"></i> Edit</a>

                                                    <a href="#delete{{ $role->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary deleterow"><i
                                                            class="icofont-ui-delete text-danger"></i> Delete</a>
                                                </div>
                                            </td>
                                            @include('admin.roles.actionmodel')
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="4">Data not found !!</td>
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

    <!-- Add Role Model -->
    <div class="modal fade" id="addModelForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-md= modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addLabel">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="permission" class="form-label">Permissions</label>
                                <div class="row">
                                    @foreach ($permission as $value)
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 py-1">
                                            {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                                            {{ $value->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
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

    <script>
        // project data table
        $(document).ready(function() {
            $('#RoleTable')
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
