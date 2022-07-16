<header id="header" class="header">
    <div class="header-top">
        <div class="container">
            <ul class="pull-right login">
                <li><i class="fa fa-phone">&nbsp;&nbsp;</i><a href="tel:9925453208">+91 99254 53208</a> </li> |
                <li><i class="fa fa-envelope">&nbsp;&nbsp;</i><a href="mailto:itmsguj@gmail.com">itmsguj@gmail.com</a>
                </li> |
                {{-- @if (!User . Identity . IsAuthenticated) --}}
                <li><a href="{{ route('website.loginpage') }}">Login </a></li> |
                <li><a href="{{ route('website.registerpage') }}">Register </a></li>
                {{-- @endif --}}
            </ul>
        </div>
    </div>
    <?php $page = Route::current()->getName(); ?>
    <div class="container">
        <!-- LOGO -->
        <div class="logo">
            <a href="{{ route('website.root') }}">
                <img src="{{ asset('assets/images/logo_big2.svg') }}" />
            </a>
        </div>
        <!-- END / LOGO -->
        <!-- NAVIGATION -->
        <nav class="navigation">
            <div class="open-menu">
                <span class="item item-1"></span>
                <span class="item item-2"></span>
                <span class="item item-3"></span>
            </div>
            <!-- MENU -->
            <ul class="menu">
                <li @if ($page == 'website.root') class="active" @endif>
                    <a href="{{ route('website.root') }}">Home</a>
                </li>

                <li @if ($page == 'website.aboutus' || $page == 'website.directordesk' || $page == 'website.certificate') class="active" @endif>
                    <a href="#">About Us</a>
                    <ul class="sub-menu">
                        <li @if ($page == 'website.aboutus') class="active" @endif>
                            <a href="{{ route('website.aboutus') }}">About Us</a>
                        </li>
                        <li @if ($page == 'website.directordesk') class="active" @endif>
                            <a href="{{ route('website.directordesk') }}">Director Desk</a>
                        </li>
                        <li @if ($page == 'website.certificate') class="active" @endif>
                            <a href="{{ route('website.certificate') }}">Certificate</a>
                        </li>
                    </ul>
                </li>

                <li @if ($page == 'website.courses') class="active" @endif>
                    <a href="{{ route('website.courses') }}">Courses</a>
                </li>

                <li @if ($page == 'website.referral') class="active" @endif>
                    <a href="{{ route('website.referral') }}">Referral</a>
                </li>

                <li @if ($page == 'website.photos' || $page == 'website.videos') class="active" @endif>
                    <a href="#">Gallery</a>
                    <ul class="sub-menu">
                        <li @if ($page == 'website.photos') class="active" @endif>
                            <a href="{{ route('website.photos') }}">Photos</a>
                        </li>
                        <li @if ($page == 'website.videos') class="active" @endif>
                            <a href="{{ route('website.videos') }}">Videos</a>
                        </li>
                    </ul>
                </li>

                <li @if ($page == 'website.student_verification') class="active" @endif>
                    <a href="{{ route('website.student_verification') }}">Student Verification</a>
                </li>

                <li @if ($page == 'website.contactus') class="active" @endif>
                    <a href="{{ route('website.contactus') }}">Contact Us</a>
                </li>

                <li @if ($page == 'website.donation') class="bg-color-1 active" @else class="bg-color-1" @endif>
                    <a href="{{ route('website.donation') }}">Donation</a>
                </li>
            </ul>
            <!-- END / MENU -->
        </nav>
        <!-- END / NAVIGATION -->
    </div>
</header>

{{-- <!-- @RenderBody() --> --}}
{{-- <!-- <script src="Styles/Scripts/Home.js"></script> --> --}}
