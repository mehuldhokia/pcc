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
                        <h3 class="fw-bold mb-0">Show User</h3>
                        <a href="{{ route('users.index') }}"
                            class="btn btn-secondary btn-sm text-uppercase btn-set-task w-sm-100">Back</a>
                    </div>
                </div>
            </div> <!-- Row end  -->

            <div class="row g-3">
                <div class="col-xl-4 col-lg-5 col-md-12">
                    <div class="card profile-card flex-column mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Profile</h6>
                        </div>
                        <div class="card-body d-flex profile-fulldeatil flex-column">
                            <div class="profile-block text-center w220 mx-auto">
                                <img @if ($user->photo) src="{{ asset('user/' . $user->photo) }}"
                                    @else
                                        src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                                    alt="" class="avatar xl rounded img-thumbnail shadow-sm">

                                {{-- To Restrict Access --}}
                                @can('user-delete')
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"
                                        style="position: absolute;top:15px;right: 15px;"><i class="icofont-edit"></i></a>
                                @else
                                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary"
                                        style="position: absolute;top:15px;right: 15px;"><i class="icofont-edit"></i></a>
                                @endcan

                                <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                    <span class="text-muted small">ID : #{{ $user->id }}</span>
                                </div>
                            </div>
                            <div class="profile-info w-100">
                                <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center">{{ $user->name }}</h6>
                                {{-- <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">24
                                    years, California</span>
                                <p class="mt-2">Duis felis ligula, pharetra at nisl sit amet, ullamcorper fringilla mi.
                                    Cras luctus metus non enim porttitor sagittis. Sed tristique scelerisque arcu id
                                    dignissim.</p> --}}
                                <div class="row g-2 pt-2">
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            Roles:
                                            <span class="ms-2">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $v)
                                                        <label class="badge alert-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-ui-touch-phone"></i>
                                            <span class="ms-2">{{ $user->phone }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-email"></i>
                                            <span class="ms-2">{{ $user->email }}</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-birthday-cake"></i>
                                            {{-- <span class="ms-2">19/03/1980</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="d-flex align-items-center">
                                            <i class="icofont-address-book"></i>
                                            {{-- <span class="ms-2">2734 West Fork Street,EASTON 02334.</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
