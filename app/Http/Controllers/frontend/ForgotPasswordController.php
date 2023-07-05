<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgotPass()
    {
        return view('frontend.forgotPassword.forgotPassLink');
    }

    public function submitForgotPass(Request $request)
    {

        $request->validate([

            'email' => 'required|email|exists:customers',

        ]);

        $token = Str::random(64);                // Str = class or helper function provides various string manipulation method

        DB::table('password_resets')->insert([

            'email' => $request->email,

            'token' => $token,

            'created_at' => Carbon::now()            //carbon = for using date time menipulation

        ]);

        Mail::send('frontend.email.resetPassLink', ['token' => $token], function ($message) use ($request) {

            $message->to($request->email);

            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }


    public function newPass($token)
    {
        return view('frontend.forgotPassword.resetPass', ['token' => $token]);
    }


    public function submitResetPassword(Request $request)

    {

        $request->validate([

            'email' => 'required|email|exists:customers',

            'password' => 'required|string|min:6|confirmed',

            'password_confirmation' => 'required'

        ]);

        $updatePassword = DB::table('password_resets')

            ->where([

                'email' => $request->email,

                'token' => $request->token

            ])

            ->first();

        if (!$updatePassword) {

            return back()->withInput()->with('error', 'Invalid token!');
        }

        $Customer = Customer::where('email', $request->email)

            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        toastr()->success('Password', 'Password Reset Successfully');

        return redirect()->route('home');
    }
}
