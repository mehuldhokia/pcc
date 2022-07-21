<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;
use DB;

class VideoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:video-create', ['only' => ['create','store']]);
        $this->middleware('permission:video-read', ['only' => ['index','show']]);
        $this->middleware('permission:video-update', ['only' => ['edit','update']]);
        $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request) {
        $videos = Video::orderBy('id','DESC')->get();
        $totalVideos = Video::count();
        return view('admin.videos.index', compact('videos', 'totalVideos'));
    }

    public function create() {
        return view('admin.videos.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'url' => 'required',
            'blob' => 'required|image|mimes:jpeg,png,jpg,gif,svg,bmp',
        ]);

        $input = $request->all();

        if($file = $request->hasFile('blob')) {
            $file = $request->file('blob');
            $fileName = "V_".date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/gallery';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }

        $video = Video::create($input);

        return redirect()->route('videos.index')->with('success','Video Inserted Successfully');
    }

    public function show($id) {
       //
    }

    public function edit($id) {
        $video = Video::find($id);
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, $id) {
        $this->validate($request, [
            'url' => 'required',
            'blob' => 'image|mimes:jpeg,png,jpg,gif,svg,bmp',
        ]);

        $input = $request->all();
        $video = Video::find($id);

        if($request->hasFile('blob')) {
            // Delete Old File
            if($video->blob) {
                $file_path = public_path().'/gallery/'.$video->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }

            // Store New File
            $file = $request->file('blob');
            $fileName = "V_".date('Ymd_His',time())."_".$file->getClientOriginalName();
            $destinationPath = public_path().'/gallery';
            $file->move($destinationPath,$fileName);
            $input['blob'] = $fileName;
        }
        else {
            // Set Old File
            $input['blob'] = $video->blob;
        }

        $video->update($input);

        return redirect()->route('videos.index')->with('success','Video Updated Successfully');
    }

    public function changeStatus(Request $request) {
        $video = Video::find($request->video_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status Changed Successfully']);
    }

    public function destroy($id) {
        $video = Video::find($id);

        if($video->blob) {
            // Delete the File
            $file_path = public_path().'/gallery/'.$video->blob;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
        }
        $video->delete();
        return redirect()->route('videos.index')->with('success','Video Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = array_map('intval', explode(',', $request->ids));
        foreach($ids as $id) {
            $video = Video::find($id);

            if($video->blob) {
                $file_path = public_path().'/gallery/'.$video->blob;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            $video->delete();
        }

        return response()->json(['success'=>"Videos Deleted Successfully."]);
    }
}
