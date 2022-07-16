<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use DB;

use Illuminate\Support\Arr;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-read', ['only' => ['index','show']]);
        $this->middleware('permission:user-update', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

        // $this->middleware('permission:user-trash', ['only' => ['']]);
        // $this->middleware('permission:user-restore', ['only' => ['']]);
        // $this->middleware('permission:user-truncate', ['only' => ['']]);
    }

    public function index(Request $request) {
        $data = User::orderBy('name','ASC')->with('roles')->get();
        return view('admin.users.index', compact('data'));
    }

    public function create() {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'phone' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        if($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/user';
            $file->move($destinationPath,$fileName);
            $input['photo'] = $fileName;
        }

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User Added Successfully');
    }

    public function show($id) {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.users.edit', compact('user','roles','userRole'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'phone' => 'required|numeric|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            // 'password' => 'required|same:confirm_password|min:6',
            // 'password' => 'same:confirm-password',
            'roles' => 'required',

        ]);

        $input = $request->all();

        // if(!empty($input['password'])) {
        //     $input['password'] = Hash::make($input['password']);
        // } else {
        //     $input = Arr::except($input,array('password'));
        // }

        $user = User::find($id);

        if($request->hasFile('photo')) {
            // Delete Old File
            if($user->photo) {
                $file_path = public_path().'/user/'.$user->photo;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('photo');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/user';
            $file->move($destinationPath,$fileName);
            $input['photo'] = $fileName;
        }
        else {
            // Set Old File
            $input['photo'] = $user->photo;
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success','User Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $user = User::find($request->user_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $user = User::find($id);
        $userRole = $user->getRoleNames()[0];
        if($userRole == "Admin") {
            return redirect()->route('users.index')->with('error','Admin User cannot be deleted.');
        }

        if($user->photo) {
            // Delete the File
            $file_path = public_path().'/user/'.$user->photo;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $user->delete();
        return redirect()->route('users.index')->with('success','User Deleted Successfully');
    }

    // public function assignRole($id) {
    //     $user = User::whereId($id)->firstOrFail()->assignRole('Vendor');
    //     redirect('/dashboard');
    // }
}
