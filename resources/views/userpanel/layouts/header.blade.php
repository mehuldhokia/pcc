<header id="header" class="header">
    <div class="container">
        <!-- LOGO -->
        <div class="logo logo_student">
            <a href="{{ route('userpanel.dashboard') }}">
                <img src="{{ asset('assets/images/logo_big2.svg') }}" />
            </a>
        </div>
        <!-- END / LOGO -->
        <?php $page = Route::current()->getName(); ?>
        <?php $student = Auth::user(); ?>
        <!-- NAVIGATION -->
        <nav class="navigation">
            <div class="open-menu">
                <span class="item item-1"></span>
                <span class="item item-2"></span>
                <span class="item item-3"></span>
            </div>
            <!-- MENU -->
            <ul class="menu">
                <li @if ($page == 'userpanel.dashboard') class="active" @endif>
                    <a href="{{ route('userpanel.dashboard') }}">Dashboard</a>
                </li>

                <li @if ($page == 'userpanel.mycourses') class="active" @endif>
                    <a href="{{ route('userpanel.mycourses') }}">My Courses</a>
                </li>

                <li @if ($page == 'userpanel.myreferral') class="active" @endif>
                    <a href="{{ route('userpanel.myreferral') }}">My Referral</a>
                </li>

                <li @if ($page == 'userpanel.upload_receipt') class="active" @endif>
                    <a href="{{ route('userpanel.upload_receipt') }}">Upload Receipt</a>
                </li>
            </ul>
            <!-- END / MENU -->
            <!-- SEARCH BOX -->

            <!-- END / SEARCH BOX -->
            <!-- LIST ACCOUNT INFO -->
            <ul class="list-account-info">

                <li class="list-item notification">
                    <div class="notification-info item-click">
                        <i class="icon md-bell"></i>
                        <span class="itemnew"></span>
                    </div>
                    <div class="toggle-notification toggle-list">
                        <div class="list-profile-title">
                            <h4>Notification</h4>
                            <span class="count-value">0</span>
                        </div>

                        <ul class="list-notification" id="sudentNoti">

                            <!-- LIST ITEM -->
                            <li class="ac-new">
                                <a href="#">
                                    <div class="list-body">
                                        <div class="author">
                                            <span>Vasim Sumara</span>
                                            <div class="div-x"></div>
                                        </div>
                                        <p>is registered with your referral code</p>
                                        <div class="image">
                                            <img @if ($student->photo) src="{{ asset('student/' . $student->photo) }}" @else src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                                                alt="" />
                                        </div>
                                        <div class="time">
                                            <span>5 minutes ago</span>
                                        </div>
                                    </div>
                                </a>
                            </li>*..
                            <!-- END / LIST ITEM -->
                        </ul>
                    </div>
                </li>

                <li class="list-item account">
                    <div class="account-info item-click">
                        <img @if ($student->photo) src="{{ asset('student/' . $student->photo) }}" @else src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                            alt="" />
                    </div>
                    <div class="toggle-account toggle-list">
                        <ul class="list-account">
                            <li><a href="{{ route('userpanel.dashboard') }}"><i
                                        class="icon md-users"></i>Dashboard</a></li>
                            <li><a href="{{ route('userprofile.loginpage') }}"><i class="icon md-arrow-right"></i>Log
                                    Out</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
            <!-- END / LIST ACCOUNT INFO -->
        </nav>
    </div>
</header>

<!-- PROFILE FEATURE -->
<section class="profile-feature">
    <div class="awe-parallax bg-profile-feature"></div>
    <div class="awe-overlay overlay-color-3"></div>
    <div class="container p-0 m-0">
        <p class="m-0 p-0" align="right" style="color: white">Last Login @ {{ $student->last_login_date->format('d-m-Y h:i a') }}</p>
        <div class="info-author">
            <div class="image">
                <img @if ($student->photo) src="{{ asset('student/' . $student->photo) }}" @else src="{{ asset('dist/assets/images/profile_av.svg') }}" @endif
                alt="" />
            </div>
            <div class="name-author">
                <h2 class="big">Welcome, {{ $student->fullname }}</h2>
            </div>
            <div class="address-author">
                <i class="fa fa-map-marker"></i>
                <h3>{{ $student->uaddress }}, {{ $student->city }}</h3>
            </div>
            {{-- <span class="m-0 p-0" align="right">
            </span> --}}

        </div>

    </div>
</section>
<!-- END / PROFILE FEATURE -->
<section class="content-bar ps-container">
    <div class="container">
        <ul class="student_menu">
            <li @if ($page == 'userpanel.dashboard') class="current" @endif>
                <a href="{{ route('userpanel.dashboard') }}">
                    <i class="icon md-file"></i>
                    Dashboard
                </a>
            </li>
            <li @if ($page == 'userpanel.profile') class="current" @endif>
                <a href="{{ route('userpanel.profile') }}">
                    <i class="icon md-user-minus"></i>
                    Profile
                </a>
            </li>
            <li @if ($page == 'userpanel.mycourses') class="current" @endif>
                <a href="{{ route('userpanel.mycourses') }}">
                    <i class="icon md-book-1"></i>
                    My Courses
                </a>
            </li>
            <li @if ($page == 'userpanel.myreferral') class="current" @endif>
                <a href="{{ route('userpanel.myreferral') }}">
                    <i class="icon fa fa-handshake-o"></i>
                    My Referral
                </a>
            </li>
            <li @if ($page == 'userpanel.myearnings') class="current" @endif>
                <a href="{{ route('userpanel.myearnings') }}">
                    <i class="icon fa fa-rupee"></i>
                    My Earning
                </a>
            </li>
            <li @if ($page == 'userpanel.quiz') class="current" @endif>
                <a href="{{ route('userpanel.quiz') }}">
                    <i class="icon fa fa-question-circle"></i>
                    G. K. Quiz
                </a>
            </li>
            <li @if ($page == 'userpanel.upload_receipt') class="current" @endif>
                <a href="{{ route('userpanel.upload_receipt') }}">
                    <i class="icon md-upload"></i>
                    Upload Receipt
                </a>
            </li>
        </ul>
    </div>

    <div class="ps-scrollbar-x-rail" style="width: 1343px; display: none; left: 0px;">
        <div class="ps-scrollbar-x" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 53px; display: none; right: 0px;">
        <div class="ps-scrollbar-y" style="top: 0px; height: 0px;"></div>
    </div>
</section>
