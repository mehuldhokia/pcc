@extends('layouts.app')

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
                        <h3 class="fw-bold mb-0">Manage Categories</h3>

                        <button type="button" class="btn btn-primary btn-set-task w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#addModelForm"><i class="icofont-plus-circle me-2 fs-6"></i>Add New
                            Category</button>

                        {{-- <a href="categories-add" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                                class="icofont-plus-circle me-2 fs-6"></i> Add Categories</a> --}}
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('messages')

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <ul>
                                @foreach ($categories as $category)
                                    <li>{{ $category->name }}</li>
                                    <ul>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include('categories.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                    </ul>
                                @endforeach
                            </ul> --}}

                            <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th width="5%">Id</th>
                                        {{-- <th>Parent Category</th> --}}
                                        <th width="10%">Image</th>
                                        <th>Category</th>
                                        {{-- <th>Slug</th> --}}
                                        {{-- <th width="6%">Status</th> --}}
                                        <th width="0%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($categories))
                                        <?php $_SESSION['i'] = 0; ?>
                                        @forelse ($categories as $category)
                                            <?php $_SESSION['i'] = $_SESSION['i'] + 1; ?>
                                            <tr>
                                                <?php $dash = ''; ?>
                                                <td>{{ $_SESSION['i'] }}</td>
                                                {{-- <td>
                                                    @if (isset($category->category_id))
                                                    {{ $category->childrenCategories }}
                                                    @else
                                                    <span class="text-primary">None</span>
                                                    @endif
                                                </td> --}}
                                                <td><img @if ($category->image) src="{{ asset('category/' . $category->image) }}"
                                                    @else
                                                        src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                                                        class="img-thumbnail m-0 p-0" width="40" height="40"></td>
                                                <th>{{ $category->name }}</th>
                                                {{-- <td> - - - </td> --}}
                                                {{-- <td>
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" id="list-group2"
                                                            data-id="{{ $category->id }}" class="form-check-input"
                                                            {{ $category->status ? 'checked' : '' }}>
                                                    </div>
                                                </td> --}}
                                                <td align="center">
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">

                                                        @can('category-update')
                                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                                class="btn btn-outline-secondary">
                                                                <i class="icofont-edit text-success"></i> Edit</a>
                                                        @endcan

                                                        @can('category-delete')
                                                            <form id="delete-form-{{ $category->id }}" method="post"
                                                                action="{{ route('categories.destroy', $category->id) }}"
                                                                style="display: none">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            </form>
                                                            <a href="" class="btn btn-outline-secondary"
                                                                onclick="if(confirm('Are you sure, You Want to delete this?')) { event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit(); } else { event.preventDefault(); }">
                                                                <i class="icofont-ui-delete text-danger"></i> Delete
                                                            </a>
                                                        @endcan

                                                    </div>
                                                </td>
                                            </tr>
                                            @if (count($category->childrenCategories))
                                                @include('categories.child-category-td', [
                                                    'child_category' => $category->childrenCategories,
                                                ])
                                            @endif
                                        @empty
                                            <tr>
                                                <td align="center" colspan="4">Data not found !!</td>
                                            </tr>
                                        @endforelse
                                        <?php unset($_SESSION['i']); ?>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Model -->
    <div class="modal fade" id="addModelForm" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered= modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="addLabel">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Parent Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">None</option>
                                @if ($categories)
                                    @foreach ($categories as $category)
                                        <?php $dash = ''; ?>
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @if (count($category->childrenCategories))
                                            @include('categories.child-category-option', [
                                                'child_category' => $category->childrenCategories,
                                            ])
                                        @endif
                                    @endforeach
                                @endif
                            </select>
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
    <script>
        $(document).ready(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var category_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeCategoryStatus',
                    data: {
                        "category_id": category_id,
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
        $('.deleterow').on('click', function() {
            var tablename = $(this).closest('table').DataTable();
            tablename
                .row($(this)
                    .parents('tr'))
                .remove()
                .draw();

        });
    </script>
@endsection
