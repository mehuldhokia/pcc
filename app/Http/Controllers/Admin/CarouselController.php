<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Carousel;
use DB;

class CarouselController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:carousel-create', ['only' => ['create','store']]);
        $this->middleware('permission:carousel-read', ['only' => ['index','show']]);
        $this->middleware('permission:carousel-update', ['only' => ['edit','update']]);
        $this->middleware('permission:carousel-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $carousels = Carousel::orderBy('ID','ASC')->get();
        return view('admin.carousels.index', compact('carousels'));
    }

    public function create() {
        return view('admin.carousels.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($file = $request->hasFile('blob')) {
            $file = $request->file('blob');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/carousel';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }

        $carousel = Carousel::create($input);

        return redirect()->route('carousels.index')->with('success','Carousel Inserted Successfully');
    }

    public function show($id) {
       //
    }

    public function edit($id) {
        $carousel = Carousel::find($id);
        return view('admin.carousels.edit', compact('carousel'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'title' => 'required',
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
        $carousel = Carousel::find($id);

        if($request->hasFile('blob')) {
            // Delete Old File
            if($carousel->blob) {
                $file_path = public_path().'/carousel/'.$carousel->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('blob');
            $fileName = date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/carousel';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }
        else {
            // Set Old File
            $input['blob'] = $carousel->blob;
        }

        $carousel->update($input);

        return redirect()->route('carousels.index')->with('success','Carousel Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $carousel = Carousel::find($request->carousel_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $carousel = Carousel::find($id);

        if($carousel->blob) {
            // Delete the File
            $file_path = public_path().'/carousel/'.$carousel->blob;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $carousel->delete();
        return redirect()->route('carousels.index')->with('success','Carousel Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        // $ids = $request->ids;
        // DB::table("carousels")->whereIn('id',explode(",",$ids))->delete();

        $ids = array_map('intval', explode(',', $request->ids));
        foreach($ids as $id) {
            $carousel = Carousel::find($id);

            if($carousel->blob) {
                $file_path = public_path().'/carousel/'.$carousel->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $carousel->delete();
        }

        return response()->json(['success'=>"Carousels Deleted Successfully."]);
    }
}
