<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CenterDetails;
use DB;

class CenterDetailsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:center-create', ['only' => ['create','store']]);
        $this->middleware('permission:center-read',   ['only' => ['index','show']]);
        $this->middleware('permission:center-update', ['only' => ['edit','update', 'changeStatus']]);
        $this->middleware('permission:center-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $centers = CenterDetails::orderBy('center_name','ASC')->get();
        return view('admin.centers.index', compact('centers'));
    }

    public function create() {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        CenterDetails::create($input);

        return redirect()->route('centers.index')->with('success','Center Details Added Successfully');
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
            'center_name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        $center = CenterDetails::find($id);

        $center->update($input);

        return redirect()->route('centers.index')->with('success','Center Details Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $center = CenterDetails::find($request->center_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $center = CenterDetails::find($id)->delete();
        return redirect()->route('centers.index')->with('success','Center Details Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = $request->ids;
        DB::table("center_details")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Center Details Deleted Successfully"]);
    }
}
