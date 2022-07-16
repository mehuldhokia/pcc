<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StudentPanelController extends Controller
{
    public function index() {
        return view('studpanel.dashboard');
    }

    public function profile() {
        return view('studpanel.profile');
    }

    public function ch_pwd() {
        return view('studpanel.ch_pwd');
    }

    public function mycourses() {
        return view('studpanel.mycourses');
    }

    public function myreferral() {
        return view('studpanel.myreferral');
    }

    public function myearnings() {
        return view('studpanel.myearnings');
    }

    public function quiz() {
        return view('studpanel.quiz');
    }

    public function upload_receipt() {
        return view('studpanel.upload_receipt');
    }
}
