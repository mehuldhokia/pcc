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
                    Photo Gallery
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
                {{-- <!-- @using (Html.BeginForm("Photos", "Home", FormMethod.Post)) --}}

                {{-- foreach (var PhotoGallery in Model.photos) --}}

                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/01.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/01.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/02.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/02.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/03.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/03.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/04.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/04.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/05.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/05.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/06.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/06.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/07.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/07.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>
                <div class="col-md-3 mb-20">
                    <div class="galleryImg">
                        <img class="mklbItem" src="{{ asset('assets/images/gallery/thumbs/08.jpg') }}"
                            data-src="{{ asset('assets/images/gallery/thumbs/08.jpg') }}" data-gallery="gallery1" />
                    </div>
                </div>


                <!-- images path from database(here putted static fro template purpose)  -->

                <!-- }
                            {{-- @Html.Partial("_PartialPage1") --}}
                    } -->
            </div>
        </div>
    </section>
    <!-- END / LOGIN -->
@endsection

@section('js')
@endsection
