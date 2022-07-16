@extends('website.layouts.app')

@section('header')
@endsection

@section('content')
<!-- SUB BANNER -->
<section class="sub-banner section">
    <div class="awe-parallax bg-profile-feature"></div>
    <div class="awe-overlay overlay-color-3"></div>
    <div class="container">
        <div class="sub-banner-content">
            <h2 class="big">
                Video Gallery
            </h2>
        </div>
    </div>
</section>
<!-- END / SUB BANNER -->
<!-- PAGE CONTROL -->
<section class="page-control">
    <div class="container">
        <div class="page-info">
            <a href="{{ route('website.root') }}"><i class="icon md-arrow-left"></i>Back to home</a>
        </div>
    </div>
</section>
<!-- END / PAGE CONTROL -->
<section class="blog">
    <div class="container">
        <div class="row">
            {{-- <!-- @using (Html.BeginForm("Videos", "Home", FormMethod.Post)) --}}

        {{-- foreach (var VideoGallery in Model.video) --}}

            <!-- Single Video -->
            <div class="col-md-3">
                <div class="galleryImg">
                    <a href="#" class="mklbItem videoPlay" data-youtube-id="https://youtu.be/czVz47n8X_0">
                        <i class="video_icon fa fa-play-circle"></i>
                        <img src="https://i.ytimg.com/vi/czVz47n8X_0/0.jpg" />
                    </a>
                </div>
            </div>
            <!-- Single Video End -->
            <!-- Single Video -->
            <div class="col-md-3">
                <div class="galleryImg">
                    <a href="#" class="mklbItem videoPlay" data-youtube-id="https://youtu.be/czVz47n8X_0">
                        <i class="video_icon fa fa-play-circle"></i>
                        <img src="https://i.ytimg.com/vi/CvSuUyP0Qs8/0.jpg" />
                    </a>
                </div>
            </div>
            <!-- Single Video End -->
            <!-- Single Video -->
            <div class="col-md-3">
                <div class="galleryImg">
                    <a href="#" class="mklbItem videoPlay" data-youtube-id="https://youtu.be/czVz47n8X_0">
                        <i class="video_icon fa fa-play-circle"></i>
                        <img src="https://i.ytimg.com/vi/PwMMspgYkUY/0.jpg" />
                    </a>
                </div>
            </div>
            <!-- Single Video End -->
            <!-- Single Video -->
            <div class="col-md-3">
                <div class="galleryImg">
                    <a href="#" class="mklbItem videoPlay" data-youtube-id="https://youtu.be/czVz47n8X_0">
                        <i class="video_icon fa fa-play-circle"></i>
                        <img src="https://i.ytimg.com/vi/Y-Xlc3OY_zg/0.jpg" />
                    </a>
                </div>
            </div>
            <!-- Single Video End -->

            <!-- }
            --->
            <div class="col-md-12">
                <div class="text-center">
                    <div class="pagination">
                        {{-- <!-- @for (int i = 1; i <= Model.PageCount; i++) --}}

                            {{-- if (i != Model.CurrentPageIndex) --}}

                        <a href="javascript:PagerClick(@i);" class="active" data->1</a>
                        <!-- }
                            else
                            { -->
                        <span class="active javascript:PagerClick(5);">2</span>
                        <!-- }
                        } -->
                    </div>
                    <input type="hidden" id="hfCurrentPageIndex" name="currentPageIndex" />
                </div>
                <script type="text/javascript">
                    function PagerClick(index) {
                        document.getElementById("hfCurrentPageIndex").value = index;
                        document.forms[0].submit();
                    }
                </script>
            </div>
            <!---
        {{-- @Html.Partial("_PartialPage1") --}}
    } -->
        </div>
    </div>
</section>
@endsection

@section('js')
@endsection
