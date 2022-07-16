<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use App\Models\Carousel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalAdmins = $totalStudents = 0;

        $users = User::with('roles')->get();
        foreach ($users as $u) {
            $role = $u->roles->pluck('name','name')->first();
            if($role == "Admin")    $totalAdmins += 1;
            if($role == "Student")  $totalStudents += 1;
        }

        return view('admin.layouts.dashboard', compact('totalAdmins', 'totalStudents'));
    }
}
