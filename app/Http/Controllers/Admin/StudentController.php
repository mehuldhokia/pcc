<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use DB;
use App\Models\RegisterUser;
use App\Models\Qualification;

class StudentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:student-create', ['only' => ['create','store']]);
        $this->middleware('permission:student-read', ['only' => ['index','show']]);
        $this->middleware('permission:student-update', ['only' => ['edit','update']]);
        $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $students = RegisterUser::where('id','!=',1)->orderBy('id','DESC')->with('qualification')->get();
        // $students = RegisterUser::orderBy('id','DESC')->with('qualification')->get();
        return view('admin.students.index', compact('students'));
    }

    public function create() {
        $qualifications = Qualification::orderBy('id','ASC')->get();
        return view('admin.students.create', compact('qualifications'));
    }

    public function chkRefCode($rc) {
        $refData = RegisterUser::where('refer_code', $rc)->first();
        if($refData) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    public function store(Request $request) {
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
            return redirect()->route('students.index')->with('success','Student Added Successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Went Wrong, Student Insertion Failed !!');
        }
    }

    public function show($id) {
       //
    }

    public function edit($id) {
        $student = RegisterUser::find($id);
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'student_code' => 'required',
            'qualification' => 'required',
            'duration' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048',
        ]);

        $input = $request->all();
        $student = RegisterUser::find($id);

        if($request->hasFile('photo')) {
            // Delete Old File
            if($student->photo) {
                $file_path = public_path().'/student/'.$student->photo;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('photo');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/student';
            $file->move($destinationPath,$fileName);
            $input['photo'] = $fileName;
        }
        else {
            // Set Old File
            $input['photo'] = $student->photo;
        }

        $student->update($input);

        return redirect()->route('students.index')->with('success','Student Details Updated Successfully');
    }

    public function chpwdform($id) {
        $student = RegisterUser::find($id);
        return view('admin.students.changepwd', compact('student'));
    }

    public function chpwdsubmit(Request $request, $id) {
        $request->validate([
            //   'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $student = RegisterUser::find($id);

        $student->password = Hash::make($request->password);
        $student->save();

        return redirect()->route('students.index')->with('success','Password changed successfully');
    }

    public function changeStatus(Request $request) {
        $student = RegisterUser::find($request->student_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $student = RegisterUser::find($id);

        if($student->photo) {
            // Delete the File
            $file_path = public_path().'/student/'.$student->photo;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $student->delete();
        return redirect()->route('students.index')->with('success','Student Details Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        // $ids = $request->ids;
        // DB::table("students")->whereIn('id',explode(",",$ids))->delete();

        $ids = array_map('intval', explode(',', $request->ids));
        foreach($ids as $id) {
            $student = RegisterUser::find($id);

            if($student->photo) {
                $file_path = public_path().'/student/'.$student->photo;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $student->delete();
        }

        return response()->json(['success'=>"Students Data Deleted Successfully"]);
    }
}
