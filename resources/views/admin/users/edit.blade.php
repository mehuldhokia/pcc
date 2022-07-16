@extends('admin.layouts.app')

@section('header')
    <!--plugin css file -->
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/cropper/cropper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">


            <form method="post" enctype="multipart/form-data"
                @can('user-delete') action="{{ route('users.update', $user->id) }}" @else action="{{ route('profile.update', $user->id) }}" @endcan>

                @csrf
                @method('PUT')

                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div
                            class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                                @can('user-delete')
                                <h3 class="fw-bold mb-0">Edit User</h3>
                                @else
                                <h3 class="fw-bold mb-0">Edit Profile</h3>
                                @endcan

                            {{-- To Restrict Access --}}
                            @can('user-delete')
                                <a href="{{ route('users.index') }}"
                                    class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                            @else
                                <a href="{{ route('profile.show', Auth::user()->id) }}"
                                    class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                            @endcan
                        </div>
                    </div>
                </div> <!-- Row end  -->

                @include('messages')

                <div class="row g-3 mb-3">
                    <div class="col-lg-4">
                        <div class="sticky-lg-top">
                            @can('role-update')
                                <div class="card mb-3">
                                    <div class="card-header py-3 bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Assign the User Role(s)</h6>
                                        <small>Single or Multiple selection is allowed</small>
                                    </div>
                                    <div class="card-body">
                                        <label class="form-label">Role</label>
                                        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                                    </div>
                                </div>
                            @endcan
                            <div class="card mb-3">
                                <div class="card-header py-3 bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Upload User Profile Image</h6>
                                    <small>With image and default file try to remove the image</small>
                                </div>
                                <div class="card-body">
                                    <input type="file" id="dropify-image" name="photo"
                                        data-default-file="{{ asset('user/' . $user->photo) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold ">Edit User information</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Fullname" value="{{ $user->name }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" id="phone" name="phone"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Phone Number" value="{{ $user->phone }}" required>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="name@example.com" value="{{ $user->email }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
