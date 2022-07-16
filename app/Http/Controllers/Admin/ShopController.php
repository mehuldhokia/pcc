<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Shop;
use App\Models\User;

use App\Mail\ShopActivationRequest;
use App\Mail\ShopActivated;

use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:shop-manage', ['only' => ['index','show','changeStatus']]);

        $this->middleware('permission:shop-create', ['only' => ['create','store']]);
        $this->middleware('permission:shop-read',   ['only' => ['index','show']]);
        $this->middleware('permission:shop-update', ['only' => ['edit','update']]);
        $this->middleware('permission:shop-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $shops = Shop::with('owner')->orderBy('name','ASC')->get();
        return view('admin.shops.index', compact('shops'));
    }

    public function create()
    {
        $user = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Vendor');
            }
        )->where('id',auth()->user()->id)->first();

        return view('admin.shops.create', compact('user'));
    }

    public function store(Request $request)
    {
        // Add validation
        $request->validate([
            'name' => 'required'
        ]);
        // Save to db
        $shop = auth()->user()->shop()->create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Send mail to admin
        $admins = User::whereHas('roles', function ($q) {
            $q->where('name', 'Admin');
        })->get();

        Mail::to($admins)->send(new ShopActivationRequest($shop));

        // dd($shop);
        return redirect()->route('home')->withMessage('Create shop request sent');
    }

    public function show(Shop $shop)
    {
        // dd($shop->owner->name. ' welcome to your shop named ', $shop->name);
        return view('admin.shops.show', compact('shop'));
    }

    public function edit($id) {
        $shop = Shop::find($id);
        return view('admin.shops.edit', compact('shop'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $shop = Shop::find($id);

        $shop->name = $request->input('name');
        $shop->description = $request->input('description');
        $shop->save();

        return redirect()->route('shops.show', $id)->with('success','Shop information updated successfully');
    }

    public function changeStatus(Request $request) {
        $shop = Shop::find($request->shop_id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status changed successfully.']);
    }

    public function destroy($id) {
        $shop = Shop::find($id);

        // if($shop->photo) {
        //     // Delete the File
        //     $file_path = public_path().'/shops/'.$shops->photo;
        //     if(file_exists($file_path)) {
        //         unlink($file_path);
        //     }
        // }
        $shop->delete();

        return redirect()->route('shops.index')->with('success','Shop deleted successfully');
    }
}
