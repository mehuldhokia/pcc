<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;
use DB;

class PermissionController extends Controller
{
    function __construct() {
        $this->middleware('permission:role-read|role-create|role-update|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-update', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $permissions = Permission::orderBy('id','DESC')->get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create() {
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
            'guard_name' => 'required',
        ]);

        $permissions = Permission::create(['name' => $request->input('name'), 'guard_name' => $request->input('guard_name')], );

        return redirect()->route('permissions.index')
                        ->with('success','Permission Created Successfully');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'guard_name' => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $permission->save();

        return redirect()->route('permissions.index')
                        ->with('success','Permission Updated Successfully');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permission Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = $request->ids;
        DB::table("permissions")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Permissions Deleted Successfully."]);
    }
}
