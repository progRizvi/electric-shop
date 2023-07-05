<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('backend.auth.register');
    }


    //read
    public function registerSubmitForm(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password'])


        ]);

        return back()->with('message', 'Register Succefull');
    }

    public function loginForm()
    {
        return view('backend.auth.login');
    }


    public function loginSubmitForm(Request $request)
    {

        $credentials = $request->except('_token');
        $authentication = auth()->attempt($credentials);


        if ($authentication) {
            toastr()->success('Admin Login successfully');
            return to_route('admin.newPage');
        } else {
            toastr()->error('Please! login as Admin');
            return to_route('home');
        }
    }
    public function logout()
    {
    
        Auth::logout();
        session()->flush();
        toastr()->warning('Admin Logout successfully');
        return to_route('login');
    }
}
