<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;

use Razorpay\Api\Api;
use Session;
use Exception;

use Auth;
use App\Models\RegisterUser;
use App\Models\Qualification;
use App\Models\Campaign;
use App\Models\DonorTransaction;

class UserProfileController extends Controller
{
    public function dashboard() {
        return view('userpanel.dashboard');
    }

    public function userlogin() {
         return view('website.login');
    }

    public function uservalidate(Request $request) {


        // if(Auth::guard('student')->attempt($request->only(['email', 'password']))) {
        if (Auth::guard('student')->attempt(['email' => request('email'), 'password' => request('password'), 'status' => 1])) {

            date_default_timezone_set("Asia/Kolkata");
            Auth::guard('student')->user()->last_login_date = date('Y-m-d H:i:s');
            Auth::guard('student')->user()->save();

            // dd(Auth::guard('student')->user()->id);

            // $course = RegisterUser::find($id);
            // $course->update($input);

            // $user->update([
            //     'last_login_date' => date('Y-m-d H:i:s'),
            // ]);
            // dd($user);

            return redirect()->route('userpanel.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function userlogout (Request $request) {
        Auth::guard('student')->logout();
        return redirect('/');
    }

    public function signup(Request $request) {
        $qualifications = Qualification::orderBy('id','ASC')->get();
        return view('website.register', compact('qualifications'));
    }

    public function userstore(Request $request) {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fullname' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'required',
            'whatsappno' => 'required',
            'city' => 'required',
            'uaddress' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'qualification_id' => 'required',
        ]);

        $student = new RegisterUser($request->input());

        if($request['refer_code'])
        {
            $refData = RegisterUser::where('refer_code', $request['refer_code'])->first();
            if(!$refData) {
                return redirect()->back()->withInput()->with('error', 'Invalid Referral Code !!');
            }

            $student->refer_by = $refData->refer_code;       // Referer Code
            $student->user_id = $refData->id;                // Referer ID
        }
        else
        {
            $student->refer_by = "PCCF00000000";            // Admin Code : PCCF00000000
            $student->user_id = "1";                        // Admin ID   : 1
        }

        // // -----
        // Generate Referral Code like PCCF00000101
        $data = DB::table('register_users')->latest('id')->first();
        // dd($data);
        ($data) ? $newid = $data->id + 1 : $newid = 1;
        $number = $newid;
        $length = 8;
        $ref = substr(str_repeat(0, $length).$number, - $length);
        $new_code = "PCCF".$ref;
        // // -----

        $student->refer_code    = $new_code;
        $student->fullname      = ucwords($request['fullname']);
        $student->email         = strtolower($request['email']);
        $student->phone         = str_replace(' ', '', $request['phone']);
        $student->whatsappno    = str_replace(' ', '', $request['whatsappno']);
        $student->city          = ucwords($request['city']);
        $student->password      = Hash::make($request['password']);

        date_default_timezone_set("Asia/Kolkata");
        $student->created_date  = date("Y-m-d H:i:s");

        if($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/student';
            $file->move($destinationPath,$fileName);
            $student->photo = $fileName;
        }
        // dd($student);

        if($student->save()) {
            return Redirect::route('userprofile.loginpage')->with('success', 'Registration is Successful. Kindly login with your Email Address & Password.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Went Wrong, Registration Failed !!');
        }
    }
}
