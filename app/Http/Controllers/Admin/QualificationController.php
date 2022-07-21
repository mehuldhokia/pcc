<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Qualification;
use DB;

class QualificationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:qualification-create', ['only' => ['create','store']]);
        $this->middleware('permission:qualification-read',   ['only' => ['index','show']]);
        $this->middleware('permission:qualification-update', ['only' => ['edit','update', 'changeStatus']]);
        $this->middleware('permission:qualification-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $qualifications = Qualification::orderBy('id','ASC')->get();
        return view('admin.qualifications.index', compact('qualifications'));
    }

    public function create() {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        Qualification::create($input);

        return redirect()->route('qualifications.index')->with('success','Qualification Added Successfully');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        $qualification = Qualification::find($id);

        $qualification->update($input);

        return redirect()->route('qualifications.index')->with('success','Qualification Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $qualification = Qualification::find($request->qualification_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $qualification = Qualification::find($id)->delete();
        return redirect()->route('qualifications.index')->with('success','Qualification Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = $request->ids;
        DB::table("qualifications")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Qualifications Deleted Successfully"]);
    }
}
