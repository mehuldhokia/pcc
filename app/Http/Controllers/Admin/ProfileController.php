<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Auth, Hash;

class ProfileController extends Controller
{
    public function index() {
        //
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id) {
        $user = User::find($id);
        return view('admin.users.profile', compact('user'));
    }

    public function edit($id) {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'phone' => 'required|numeric|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $input = $request->all();

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

        return redirect()->route('profile.show', $id)->with('success','Profile updated successfully');
    }

    public function destroy($id) {
        //
    }

    public function chpwdform() {
        return view('admin.users.changepwd');
    }

    public function chpwdsubmit(Request $request) {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        $message = 'Password changed successfully. Try to login with new password !!';
        return back()->with('success', $message);
    }
}
