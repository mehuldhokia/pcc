<div class="sidebar px-4 py-4 py-md-4 me-0 gradient=">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('home') }}" class="mb-0 brand-icon bg-white rounded p-1 px-3">
            <span class="logo-icon">
                <img src="{{ asset('assets/images/favicon.png') }}" width="40" class="bg-white rounded p-1">
                {{-- <i class="bi bi-bag-check-fill fs-4"></i> --}}
            </span>
            <span class="logo-text text-dark m-0 pl-0 pb-2">PCC India</span>
        </a>

        {{-- @if (!empty(Auth::user()->getRoleNames()))
            @foreach (Auth::user()->getRoleNames() as $v)
                <?php $userRole = $v; ?>
            @endforeach
        @endif --}}

        <?php $page = Route::current()->getName(); ?>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">

            <li>
                <a href="{{ route('home') }}"
                    @if ($page == 'home') class="m-link active" @else class="m-link" @endif>
                    <i class="icofont-home fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @can('user-read', 'role-read')
                <hr class="dropdown-divider border-light">
                {{-- <li class="collapsed">
                    <a @if ($page == 'users.index' || $page == 'roles.index' || $page == 'permissions.index') class="m-link active" @else class="m-link" @endif
                        data-bs-toggle="collapse" data-bs-target="#menu-user" href="#">
                        <i class="icofont-people fs-5"></i> <span>User Management</span> <span
                            class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>

                    <ul class="sub-menu collapse" id="menu-user"> --}}
                @can('user-read')
                    <li>
                        <a href="{{ route('users.index') }}"
                            @if ($page == 'users.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-users fs-5"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan

                @can('role-read')
                    <li>
                        <a href="{{ route('roles.index') }}"
                            @if ($page == 'roles.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-id-card fs-5"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                @endcan

                @can('role-read')
                    <li>
                        <a href="{{ route('permissions.index') }}"
                            @if ($page == 'permissions.index') class="m-link active" @else class="m-link" @endif>
                            <i class="icofont-key fs-5"></i>
                            <span>Permissions</span>
                        </a>
                    </li>
                @endcan
                {{-- </ul>
                </li> --}}
                <hr class="dropdown-divider border-light">
            @endcan

            @can('carousel-read')
                <li>
                    <a href="{{ route('carousels.index') }}"
                        @if ($page == 'carousels.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-ui-image fs-5"></i>
                        <span>Carousel</span>
                    </a>
                </li>
            @endcan

            @can('course-read')
                <li>
                    <a href="{{ route('courses.index') }}"
                        @if ($page == 'courses.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-book-alt fs-5"></i>
                        <span>Courses</span>
                    </a>
                </li>
            @endcan

            @can('student-read')
                <li>
                    <a href="{{ route('students.index') }}"
                        @if ($page == 'students.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-group-students fs-5"></i>
                        <span>Student Details</span>
                    </a>
                </li>
            @endcan

            @can('center-read')
                <li>
                    <a href="{{ route('centers.index') }}"
                        @if ($page == 'centers.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-building-alt fs-5"></i>
                        <span>Center Details</span>
                    </a>
                </li>
            @endcan

            @can('city-read')
                <li>
                    <a href="{{ route('cities.index') }}"
                        @if ($page == 'cities.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-location-pin fs-5"></i>
                        <span>City Details</span>
                    </a>
                </li>
            @endcan

            @can('qualification-read')
                <li>
                    <a href="{{ route('qualifications.index') }}"
                        @if ($page == 'qualifications.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-certificate-alt-2 fs-5"></i>
                        <span>Qualifications</span>
                    </a>
                </li>
            @endcan

            @can('contact-read')
                <li>
                    <a href="{{ route('contacts.index') }}"
                        @if ($page == 'contacts.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-email fs-5"></i>
                        <span>Contact Messages</span>
                    </a>
                </li>
            @endcan

            @can('photo-read')
                <li>
                    <a href="{{ route('photos.index') }}"
                        @if ($page == 'photos.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-image fs-5"></i>
                        <span>Photo Gallery</span>
                    </a>
                </li>
            @endcan

            @can('video-read')
                <li>
                    <a href="{{ route('videos.index') }}"
                        @if ($page == 'videos.index') class="m-link active" @else class="m-link" @endif>
                        <i class="icofont-video-alt fs-5"></i>
                        <span>Video Gallery</span>
                    </a>
                </li>
            @endcan

        </ul>

        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
