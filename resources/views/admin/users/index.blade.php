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
                        <h3 class="fw-bold mb-0">Manage Users</h3>
                        @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                    class="icofont-plus-circle me-2 fs-6"></i> Create New User</a>
                        @endcan
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('messages')

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Roles</th>
                                        <th style="width: 0%">Status</th>
                                        <th style="width: 0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td><img @if ($user->photo) src="{{ asset('user/' . $user->photo) }}"
                                                @else
                                                    src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                                                    class="img-thumbnail m-0 p-0" width="50" height="50"></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge alert-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" id="list-group2" data-id="{{ $user->id }}"
                                                        class="form-check-input" {{ $user->status ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    @can('user-read')
                                                        <a href="{{ route('users.show', $user->id) }}"
                                                            class="btn btn-outline-secondary">
                                                            <i class="icofont-eye-alt text-primary"></i> Show</a>
                                                    @endcan

                                                    @can('user-update')
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                            class="btn btn-outline-secondary">
                                                            <i class="icofont-edit text-success"></i> Edit</a>
                                                    @endcan

                                                    @can('user-delete')
                                                        <form id="delete-form-{{ $user->id }}" method="post"
                                                            action="{{ route('users.destroy', $user->id) }}"
                                                            style="display: none">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                        <a href="" class="btn btn-outline-secondary"
                                                            onclick="
                                                    if(confirm('Are you sure, You Want to delete this?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{ $user->id }}').submit();
                                                    }
                                                    else{
                                                      event.preventDefault();
                                                    }">
                                                            <i class="icofont-ui-delete text-danger"></i> Delete</a>
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
    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeUserStatus',
                    data: {
                        "user_id": user_id,
                        "status": status,
                    },
                    success: function(data) {
                        console.log(data.success);
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
