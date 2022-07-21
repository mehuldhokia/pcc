<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class UserPanelController extends Controller
{
    public function index() {
        return view('userpanel.dashboard');
    }

    public function profile() {
        return view('userpanel.profile');
    }

    public function ch_pwd() {
        return view('userpanel.ch_pwd');
    }

    public function mycourses() {
        return view('userpanel.mycourses');
    }

    public function myreferral() {
        return view('userpanel.myreferral');
    }

    public function myearnings() {
        return view('userpanel.myearnings');
    }

    public function quiz() {
        return view('userpanel.quiz');
    }

    public function upload_receipt() {
        return view('userpanel.upload_receipt');
    }
}
