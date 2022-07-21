@extends('admin.layouts.app')

@section('header')
@endsection

@section('content')
    <!-- Body: Body -->
    <div class="body d-flex pb-3">
        <div class="container-xxl">
            <div class="row align-items-center">
                <div class="border-0 mb-4">
                    <div
                        class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Change Password</h3>
                        <a href="{{ route('students.index') }}"
                                class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                    </div>
                </div>
            </div> <!-- Row end  -->

            @include('toastr')

            <div class="row g-3">
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <div class="alert alert-primary pb-2">
                        <h6 class="text-center fw-bold">Confirm Student Information</h6>
                        {{-- <small class="text-center">Confirm it before changing the Password</small> --}}

                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label">ID</label> : {{ $student->id }}<br>
                                <label class="form-label">Name</label> : {{ $student->fullname }}<br>
                                <label class="form-label">Email</label> : {{ $student->email }}<br>
                                <label class="form-label">Location</label> : {{ $student->uaddress }}, {{ $student->city }}<br>
                                <label class="form-label">Qualification</label> : {{ $student->qualification->name }}<br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12">

                    <form method="POST" action="{{ route('students.chpwdsubmit', $student->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div
                                class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                <h6 class="m-0 fw-bold">Change Password</h6>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" autocomplete="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password" class="form-label">Password Confirmation</label>
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            name="password_confirmation" autocomplete="password_confirmation">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12" align="center">
                                        <button type="submit" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100">
                                            <i class="icofont-key me-2 fs-6"></i> Update Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
