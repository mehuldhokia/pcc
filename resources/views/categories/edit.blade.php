@extends('layouts.app')

@section('header')
    <!--plugin css file -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">

            <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Edit Category</h3>
                            <a href="{{ route('categories.index') }}"
                                class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                        </div>
                    </div>
                </div> <!-- Row end  -->

                @include('messages')

                <div class="row g-3 mb-3">
                    <div class="col-lg-4">
                        <div class="sticky-lg-top">
                            <div class="card">
                                <div class="card-header py-3 bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Upload Category Image</h6>
                                    <small>With image and default file try to remove the image</small>
                                </div>
                                <div class="card-body pt-0">
                                    <input type="file" id="dropify-image" name="image" data-default-file="{{ asset('category/'.$category->image) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Edit Category</h6>
                            </div>
                                <div class="card-body pt-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Fullname" value="{{ $category->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category_id" class="form-label">Parent Category</label>
                                        <select name="category_id" class="form-control">
                                            <option value="">None</option>
                                            @if ($categories)
                                                @foreach ($categories as $cate)
                                                    <?php $dash = ''; ?>
                                                    <option value="{{ $cate->id }}"
                                                        @if ($category->category_id == $cate->id) selected @endif>
                                                        {{ $cate->name }}
                                                    </option>
                                                    @if (count($cate->childrenCategories))
                                                        @include('categories.child-category-option-edit', [
                                                            'child_category' => $cate->childrenCategories,
                                                        ])
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-md-6">
                                    <button type="submit"
                                        class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row end  -->
            </form>

        </div>
    </div>
@endsection

@section('js')
    <!-- Jquery Plugin -->
    <script src="{{ asset('dist/assets/plugin/cropper/cropper.min.js') }}"></script>
    <script src="{{ asset('dist/assets/plugin/cropper/cropper-init.js') }}"></script>
    <script src="{{ asset('dist/assets/bundles/dropify.bundle.js') }}"></script>

    <script>
        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-image').dropify();
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
@endsection
