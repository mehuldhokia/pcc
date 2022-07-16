<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;

use Razorpay\Api\Api;
use Session;
use Exception;

use Auth;
use App\Models\User;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\DonorTransaction;

class StudentProfileController extends Controller
{
    public function userlogin() {
         return view('studpanel.userlogin');
    }

    public function uservalidate(Request $request) {
        if (\Auth::attempt(['email' => request('email'), 'password' => request('password'), 'usertype'=>'user'])) {
            return redirect()->route('user.home');
        }
        else
        {
            return redirect()->back()->with('error','Sorry, Your credentials is Invalid.');
        }
    }

    public function signup(Request $request) {
        return view('studpanel.usersignup');
    }

    public function userstore(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ]);

        $user = new User($request->input());
        $user->usertype = 'user';
        $user->password = Hash::make($request['password']);

        if($user->save()) {
            return Redirect::route('user.signup')->with('success', 'Registration is Successful. Kindly login with your Email Address & Password.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something Went Wrong, Registration Failed !');
        }
    }

    public function userlogout (Request $request) {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');

        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // return redirect('/');
    }

    // // // --------------- // // //

    public function dashboard() {
        $donor = User::findOrFail(Auth::user()->id);
        $donated = DonorTransaction::where('email',$donor->email)->sum('payingamount');
        return view('user.dashboard', compact('donated'));
    }

    public function transactions() {
        $donor = User::findOrFail(Auth::user()->id);
        $transactions = DonorTransaction::where('email',$donor->email)->orderBy('id','ASC')->get();
        return view('user.transactions', compact('transactions'));
    }

    public function donate() {
        $donations = Donation::orderBy('donname','ASC')->get();
        $campaigns = Campaign::where('status','active')->orderBy('id','ASC')->get();
        return view('user.donate', compact('donations','campaigns'));
    }
    public function gateway(Request $request) {
        // For Insert First & Update
        // $transaction = new DonorTransaction($request->input());
        // $transaction->save();
        // $input = DonorTransaction::orderBy('id','DESC')->with('donations', 'campaigns')->first();

        $input = $request->all();

        return view('user.gateway', compact('input'));
    }


    public function pay(Request $request) {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount']));

                $DT = new DonorTransaction($request->input());

                $DT->donation_id = $input['donation_id'];
                $DT->campaign_id = $input['campaign_id'];
                $DT->email = $response->email;
                $DT->phone = $response->contact;
                $DT->payment_datetime = $response->created_at;
                $DT->payingamount = $input['payingamount'];
                $DT->message = $input['message'];

                $DT->razorpay_payment_id = $response->id;
                $DT->status = $response->status;
                $DT->currency = $response->currency;
                $DT->method = $response->method;
                $DT->captured = $response->captured;
                $DT->international = $response->international;
                $DT->description = $response->description;

                $DT->save();

                /* ----------- UPDATE ----------- */

                // $DT = DonorTransaction::find($input['id']);

                // $DT->card_id = (string)$response->card_id;
                // $DT->bank = (string)$response->bank;
                // $DT->wallet = (string)$response->wallet;
                // $DT->fee = (string)$response->fee;
                // $DT->tax = (string)$response->tax;
                // $DT->error_code = (string)$response->error_code;
                // $DT->error_description = (string)$response->error_description;
                // $DT->error_source = (string)$response->error_source;
                // $DT->error_step = (string)$response->error_step;
                // $DT->error_reason = (string)$response->error_reason;
                // $DT->acquirer_data = json_decode( json_encode($response->acquirer_data), true);
                // $DT->paid_at = (string)$response->created_at;

                // echo "DT OBJECT<br>";
                // echo "<pre>";
                // print_r($DT);
                // echo "</pre><hr>";
                // dd($DT);

                // $DT->save();

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        \Session::put('success', 'Payment Successful');

        return Redirect::to('userdonate')->with('success','Payment Successful.');
        // return redirect()->back();
    }

}
