<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CityDetails;
use DB;

class CityDetailsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:city-create', ['only' => ['create','store']]);
        $this->middleware('permission:city-read',   ['only' => ['index','show']]);
        $this->middleware('permission:city-update', ['only' => ['edit','update', 'changeStatus']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cities = CityDetails::orderBy('city_name','ASC')->get();
        return view('admin.cities.index', compact('cities'));
    }

    public function create() {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        CityDetails::create($input);

        return redirect()->route('cities.index')->with('success','City Details Added Successfully');
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
            'city_name' => 'required',
            'status' => 'required',
        ]);

        $input = $request->all();

        $city = CityDetails::find($id);

        $city->update($input);

        return redirect()->route('cities.index')->with('success','City Details Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $city = CityDetails::find($request->city_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $city = CityDetails::find($id)->delete();
        return redirect()->route('cities.index')->with('success','City Details Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = $request->ids;
        DB::table("city_details")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"City Details Deleted Successfully"]);
    }
}
