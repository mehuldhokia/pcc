<header id="header" class="header">
    <div class="container">
        <!-- LOGO -->
        <div class="logo logo_student">
            <a href="{{ route('studpanel.dashboard') }}">
                <img src="{{ asset('assets/images/logo_big2.svg') }}" />
            </a>
        </div>
        <!-- END / LOGO -->
        <?php $page = Route::current()->getName(); ?>

        <!-- NAVIGATION -->
        <nav class="navigation">
            <div class="open-menu">
                <span class="item item-1"></span>
                <span class="item item-2"></span>
                <span class="item item-3"></span>
            </div>
            <!-- MENU -->
            <ul class="menu">
                <li @if ($page == 'studpanel.dashboard') class="active" @endif>
                    <a href="{{ route('studpanel.dashboard') }}">Dashboard</a>
                </li>

                <li @if ($page == 'studpanel.mycourses') class="active" @endif>
                    <a href="{{ route('studpanel.mycourses') }}">My Courses</a>
                </li>

                <li @if ($page == 'studpanel.myreferral') class="active" @endif>
                    <a href="{{ route('studpanel.myreferral') }}">My Referral</a>
                </li>

                <li @if ($page == 'studpanel.upload_receipt') class="active" @endif>
                    <a href="{{ route('studpanel.upload_receipt') }}">Upload Receipt</a>
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
                                        <p>is registered with your reffarel code</p>
                                        <div class="image">
                                            <img src="{{ asset('assets/images/user_images/team-13.jpg') }}"
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
                        <img src="{{ asset('assets/images/user_images/team-13.jpg') }}" alt="" />
                    </div>
                    <div class="toggle-account toggle-list">
                        <ul class="list-account">
                            <li><a href="{{ route('studpanel.dashboard') }}"><i
                                        class="icon md-users"></i>Dashboard</a></li>
                            <li><a href="{{ route('website.loginpage') }}"><i class="icon md-arrow-right"></i>Log Out</a></li>
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
    <div class="container">
        <div class="info-author">
            <div class="image">
                <img src="{{ asset('assets/images/user_images/team-13.jpg') }}" alt="" />
            </div>
            <div class="name-author">
                <h2 class="big">Welcome, Unknown</h2>
            </div>
            <div class="address-author">
                <i class="fa fa-map-marker"></i>
                <h3>Student Address</h3>
            </div>
        </div>

    </div>
</section>
<!-- END / PROFILE FEATURE -->
<section class="content-bar ps-container">
    <div class="container">
        <ul class="student_menu">
            <li @if ($page == 'studpanel.dashboard') class="current" @endif>
                <a href="{{ route('studpanel.dashboard') }}">
                    <i class="icon md-file"></i>
                    Dashboard
                </a>
            </li>
            <li @if ($page == 'studpanel.profile') class="current" @endif>
                <a href="{{ route('studpanel.profile') }}">
                    <i class="icon md-user-minus"></i>
                    Profile
                </a>
            </li>
            <li @if ($page == 'studpanel.mycourses') class="current" @endif>
                <a href="{{ route('studpanel.mycourses') }}">
                    <i class="icon md-book-1"></i>
                    My Courses
                </a>
            </li>
            <li @if ($page == 'studpanel.myreferral') class="current" @endif>
                <a href="{{ route('studpanel.myreferral') }}">
                    <i class="icon fa fa-handshake-o"></i>
                    My Referral
                </a>
            </li>
            <li @if ($page == 'studpanel.myearnings') class="current" @endif>
                <a href="{{ route('studpanel.myearnings') }}">
                    <i class="icon fa fa-rupee"></i>
                    My Earning
                </a>
            </li>
            <li @if ($page == 'studpanel.quiz') class="current" @endif>
                <a href="{{ route('studpanel.quiz') }}">
                    <i class="icon fa fa-question-circle"></i>
                    G. K. Quiz
                </a>
            </li>
            <li @if ($page == 'studpanel.upload_receipt') class="current" @endif>
                <a href="{{ route('studpanel.upload_receipt') }}">
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
