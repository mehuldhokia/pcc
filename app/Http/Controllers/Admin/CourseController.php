<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Course;
use DB;

class CourseController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:course-create', ['only' => ['create','store']]);
        $this->middleware('permission:course-read', ['only' => ['index','show']]);
        $this->middleware('permission:course-update', ['only' => ['edit','update']]);
        $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $courses = Course::orderBy('ID','ASC')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create() {
        return view('admin.courses.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'course_code' => 'required',
            'qualification' => 'required',
            'duration' => 'required',
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $input = $request->all();

        if($file = $request->hasFile('blob')) {
            $file = $request->file('blob');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/course';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }

        $course = Course::create($input);

        return redirect()->route('courses.index')->with('success','Course Added Successfully');
    }

    public function show($id) {
       //
    }

    public function edit($id) {
        $course = Course::find($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
            'course_code' => 'required',
            'qualification' => 'required',
            'duration' => 'required',
            'blob' => 'image|mimes:jpeg,png,jpg,gif,bmp,svg|max:2048',
        ]);

        $input = $request->all();
        $course = Course::find($id);

        if($request->hasFile('blob')) {
            // Delete Old File
            if($course->blob) {
                $file_path = public_path().'/course/'.$course->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('blob');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/course';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }
        else {
            // Set Old File
            $input['blob'] = $course->blob;
        }

        $course->update($input);

        return redirect()->route('courses.index')->with('success','Course Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $course = Course::find($request->course_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $course = Course::find($id);

        if($course->blob) {
            // Delete the File
            $file_path = public_path().'/course/'.$course->blob;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $course->delete();
        return redirect()->route('courses.index')->with('success','Course Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        // $ids = $request->ids;
        // DB::table("courses")->whereIn('id',explode(",",$ids))->delete();

        $ids = array_map('intval', explode(',', $request->ids));
        foreach($ids as $id) {
            $course = Course::find($id);

            if($course->blob) {
                $file_path = public_path().'/course/'.$course->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $course->delete();
        }

        return response()->json(['success'=>"Courses Deleted Successfully"]);
    }
}
