<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Photo;
use DB;

class PhotoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:photo-create', ['only' => ['create','store']]);
        $this->middleware('permission:photo-read', ['only' => ['index','show']]);
        $this->middleware('permission:photo-update', ['only' => ['edit','update']]);
        $this->middleware('permission:photo-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $photos = Photo::orderBy('id','DESC')->get();
        $totalPhotos = Photo::count();
        return view('admin.photos.index', compact('photos', 'totalPhotos'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        $this->validate($request, [
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg,bmp',
        ]);

        $input = $request->all();

        if($file = $request->hasFile('blob')) {
            $file = $request->file('blob');
            $fileName = "P_".date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/gallery';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }

        $photo = Photo::create($input);

        return redirect()->route('photos.index')->with('success','Photo Inserted Successfully');
    }

    public function show($id) {
       //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg,bmp',
        ]);

        $input = $request->all();
        $photo = Photo::find($id);

        if($request->hasFile('blob')) {
            // Delete Old File
            if($photo->blob) {
                $file_path = public_path().'/gallery/'.$photo->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('blob');
            $fileName = "P_".date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/gallery';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }
        else {
            // Set Old File
            $input['blob'] = $photo->blob;
        }

        $photo->update($input);

        return redirect()->route('photos.index')->with('success','Photo Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $photo = Photo::find($request->photo_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $photo = Photo::find($id);

        if($photo->blob) {
            // Delete the File
            $file_path = public_path().'/gallery/'.$photo->blob;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $photo->delete();
        return redirect()->route('photos.index')->with('success','Photo Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = array_map('intval', explode(',', $request->ids));
        foreach($ids as $id) {
            $photo = Photo::find($id);

            if($photo->blob) {
                $file_path = public_path().'/gallery/'.$photo->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $photo->delete();
        }

        return response()->json(['success'=>"Photos Deleted Successfully."]);
    }
}
