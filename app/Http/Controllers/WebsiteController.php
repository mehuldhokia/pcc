<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.welcome');
    }

    public function login()
    {
        return view('website.login');
    }

    public function register()
    {
        return view('website.register');
    }

    public function aboutus()
    {
        return view('website.aboutus');
    }

    public function directordesk()
    {
        return view('website.directordesk');
    }

    public function certificate()
    {
        return view('website.certificate');
    }

    public function courses()
    {
        return view('website.courses');
    }
    public function course_details()
    {
        return view('website.course_details');
    }
    public function course_intro()
    {
        return view('website.course_intro');
    }

    public function referral()
    {
        return view('website.referral');
    }

    public function photos()
    {
        return view('website.photos');
    }

    public function videos()
    {
        return view('website.videos');
    }

    public function student_verification()
    {
        return view('website.student_verification');
    }

    public function contactus()
    {
        return view('website.contactus');
    }

    public function donation()
    {
        return view('website.donation');
    }
}
