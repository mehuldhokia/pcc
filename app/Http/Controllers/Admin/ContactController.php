<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Contact;
use DB;
use Carbon\Carbon;

use App\Mail\ContactMessageReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    function __construct()
    {
        // $this->middleware('permission:contact-create', ['only' => ['create','store']]);
        $this->middleware('permission:contact-read',   ['only' => ['index','show']]);
        // $this->middleware('permission:contact-update', ['only' => ['edit','update', 'changeStatus']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function create() {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $input = $request->all();

        date_default_timezone_set("Asia/Kolkata");
        $input['created_at'] = Carbon::now();

        $contact = Contact::create($input);

        // Send mail to admin
        $admins = User::whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();

        Mail::to($admins)->send(new ContactMessageReceived($contact));

        return response()->json(['success' => 'Message Submitted Successfully']);

        // return redirect()->route('contacts.index')->with('success','Your Message Submitted Successfully');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        $contact = Contact::find($id)->delete();
        return redirect()->route('contacts.index')->with('success','Message Deleted Successfully');
    }

    public function deleteAll(Request $request) {
        $ids = $request->ids;
        DB::table("contacts")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Contact Messages Deleted Successfully"]);
    }
}
