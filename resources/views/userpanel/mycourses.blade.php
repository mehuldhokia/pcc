@extends('userpanel.layouts.app')

@section('header')
@endsection

@section('content')
    <section id="course-concern" class="course-concern">
        <div class="container">
            <div class="row">
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    Your Course List is Empty.
                </div>
            </div>

            <div class="col-md-12 text-center">
                <a class="mc-btn btn-style-1" href="{{ route('website.courses') }}" target="_blank">
                    View More Courses
                </a>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
