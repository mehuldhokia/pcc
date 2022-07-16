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
                        <h3 class="fw-bold mb-0">Manage Cities</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('messages')

            <div class="row clearfix g-3">
                <div class="col-sm-4">
                    <form method="POST" action="{{ route('cities.store') }}">
                        @csrf
                    <div class="card mb-3">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Add New City</h6>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="city_name" class="form-label">City Name</label>
                                            <input type="text" id="city_name" name="city_name"
                                                class="form-control @error('city_name') is-invalid @enderror" required>
                                            @error('city_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="radio"
                                                    value="1" checked>
                                                <label class="form-check-label">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input name="status" class="form-check-input" type="radio" value="0">
                                                <label class="form-check-label">
                                                    In-active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal"
                                    data-bs-target="#addModelForm"><i class="icofont-plus-circle me-2 fs-6"></i>Add</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <button class="btn btn-outline-danger btn-sm mb-3 delete_all"
                                data-url="{{ url('citiesDeleteAll') }}">Delete All Selected</button>

                            <table id="CityTable" class="table table-hover align-middle mb-0" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 0%"><input type="checkbox" id="master"></th>
                                        <th width="5%">#</th>
                                        <th>City Name</th>
                                        <th style="width: 0%">Status</th>
                                        <th style="width: 0%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cities as $city)
                                        <tr>
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $city->id }}">
                                            </td>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $city->city_name }}</td>
                                            <td>
                                                @can('city-update')
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" id="list-group2" data-id="{{ $city->id }}"
                                                            class="form-check-input" {{ $city->status ? 'checked' : '' }}>
                                                    </div>
                                                @endcan
                                            </td>
                                            <td align="center">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="#edit{{ $city->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary"><i
                                                            class="icofont-edit text-success"></i></a>

                                                    <a href="#delete{{ $city->id }}" data-bs-toggle="modal"
                                                        class="btn btn-outline-secondary deleterow"><i
                                                            class="icofont-ui-delete text-danger"></i></a>
                                                </div>
                                            </td>
                                            @include('admin.cities.actionmodel')
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="5">Data not found !!</td>
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
                var city_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeCityStatus',
                    data: {
                        "city_id": city_id,
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
            $('#CityTable')
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
